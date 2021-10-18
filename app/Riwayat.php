<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    //
    protected $guarded = ['id'];

    public function pembeli()
    {
        return $this->belongsTo('App\data_pembeli', 'id');
    }

    public function kasir()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function pembelian()
    {
        return $this->hasMany('App\Pembelian', 'riwayat_id');
    }
}
