<?php

namespace App\http\Models;

use App\Http\Models\maplop;
use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    protected $guarded = [];

    public function maptop()
    {
        return $this->hasMany(maplop::class, 'rak_id', 'id');
    }
}
