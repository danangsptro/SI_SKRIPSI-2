<?php

namespace App\http\Models;

use App\Http\Models\maplop;
use Illuminate\Database\Eloquent\Model;

class jenisData extends Model
{
    protected $tabel = 'jenis_data';
    protected $guarded = [];

    public function maplop()
    {
        return $this->hasMany(maplop::class, 'jenis_data_id', 'id');
    }
}
