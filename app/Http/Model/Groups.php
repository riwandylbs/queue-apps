<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\Roles;

class groups extends Model
{
    protected $table = 'groups';

    // Relation one to Role
    public function roles()
    {
        return $this->belongsTo(Roles::class, 'id', 'group_id');
    }
}
