<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TempDock extends Model
{
    protected $table = "temp_loading_dock";

    public function store(Request $request)
    {
        return true;
    }
}
