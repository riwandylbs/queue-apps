<?php
namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Model\Roles;

class UserAccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $user   = $request->user();
        $route  = \DB::table('roles')
            ->join('route', 'roles.id', '=', 'route.role_id')
            ->where('group_id', $user->group_id)
            ->select('route.route')
            ->get()->toArray();

        foreach ($route as $key => $value) {
            $routes[] = $value->route;
        }

        if (!empty($user) && !(in_array($request->getPathInfo(), $routes))) {
            return new Response(view('auth.forbidden'));
        }

        return $next($request);
    }
}
