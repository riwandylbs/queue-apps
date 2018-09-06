<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AccessMenu extends Model
{
    public static function hasAccessMenu()
    {
        $hasAccess = new \stdClass();
        $hasAccess->isSuccess = false;
        $hasAccess->data = null;

        if (Auth::check()) {
            
            $user = Auth::user();
            $menu = \DB::select("select * from `users` left join `groups` on `users`.`group_id` = `groups`.`id` left join `roles` on `groups`.`id` = `roles`.`group_id` left join `route` on `roles`.`id` = `route`.`role_id` where `users`.`id` = ".$user->id." order by `route`.`name` desc");

            $item = [];
            foreach ($menu as $key => $value) {
                $item[] = [
                    'route' => $value->route,
                    'name' => $value->name,
                    'icon' => $value->icon,
                ];   
            }

            $hasAccess->isSuccess = true;
            $hasAccess->data = $item;

            return $hasAccess;
        } 

        return $hasAccess;
    }
}
