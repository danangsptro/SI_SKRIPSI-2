<?php

namespace App\Http\Models;

use App\http\Models\jenisData;
use App\http\Models\rak;
use App\http\Models\status;
use Illuminate\Database\Eloquent\Model;

class maplop extends Model
{
    public function jenisData()
    {
        return $this->belongsTo(jenisData::class, 'id');
    }

    public function rak()
    {
        return $this->belongsTo(rak::class, 'id');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'id');
    }
}
