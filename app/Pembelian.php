<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    protected $guarded = ['id'];

    public function stok_barang() {
        return $this->belongsTo('App\stok_barang', 'id');
    }

    public function riwayat() {
        return $this->belongsTo('App\riwayat', 'id');
    }
}
