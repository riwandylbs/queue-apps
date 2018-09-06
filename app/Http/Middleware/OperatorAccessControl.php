<?php
namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OperatorAccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = $request->user();
        if (!empty($user) && $user->group_id != 2) {
            return new Response(view('auth.forbidden'));
        }

        return $next($request);
    }
}
