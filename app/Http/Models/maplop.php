<?php

namespace App\Http\Models;

use App\http\Models\jenisData;
use App\http\Models\rak;
use App\http\Models\status;
use App\User;
use Illuminate\Database\Eloquent\Model;

class maplop extends Model
{
    protected $tabel = 'maplops';
    protected $guarded = [];

    public function jenisData()
    {
        return $this->belongsTo(jenisData::class, 'jenis_data_id');
    }

    public function rak()
    {
        return $this->belongsTo(rak::class, 'rak_id');
    }

    public function statusName()
    {
        return $this->belongsTo(status::class, 'status_id');
    }

}
