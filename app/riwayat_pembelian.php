<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class riwayat_pembelian extends Model
{
    protected $table = 'riwayat_pembelians';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'tanggal_pembelian',
    	'total_pembelian',
    	'dibayar',
    	'kembali',
        'sisa',
        'catatan',
        'stok_barang_id',
        'data_pembeli_id',
        'user_id'
    ];
    
    public function stok_barang()
    {
        return $this->belongsTo('App\stok_barang');
    }

    public function data_pembeli()
    {
        return $this->belongsTo('App\data_pembeli');
    }
}
