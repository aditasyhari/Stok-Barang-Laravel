<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok_barang extends Model
{
    protected $table = 'stok_barangs';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'tanggal',
        'asal_barang',
    	'nama_barang',
        'jumlah_barang',
        'harga_jual',
    	'harga_beli',
        'kode_barang',
    	'user_id'
    ];
    
    public function pembelian()
    {
        return $this->hasMany('App/Pembelian', 'stok_barang_id');
    }

    public function user()
    {
        return $this->belongsTo('App\user', 'id');
    }

    public function barangMasuk() 
    {
        return $this->hasMany(BarangMasuk::class, 'stok_id');
    }
}