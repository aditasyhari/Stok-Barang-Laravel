<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    //
    protected $guarded = ['id'];

    public function stok() {
        return $this->belongsTo(stok_barang::class, 'id');
    }
}
