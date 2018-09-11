<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AccessGudang extends Model
{
    protected $table = 'access_gudang';

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }
}
