<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\Route;

class Roles extends Model
{
    protected $table = 'roles';

    public function route()
    {
        return $this->hasMany(Route::class, 'id', 'role_id');
    }
}
