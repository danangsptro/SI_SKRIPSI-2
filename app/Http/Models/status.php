<?php

namespace App\http\Models;

use App\Http\Models\maplop;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $guarded = [];

    public function maplop()
    {
        return $this->hasMany(maplop::class, 'status_id', 'id');
    }
}
