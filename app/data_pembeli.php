<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_pembeli extends Model
{
    protected $table = 'data_pembelis';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama_pembeli',
    	'alamat_pembeli',
    	'nomor_hp',
        'email_pembeli',
        'kode_pembeli'
    ];

    public function riwayat()
    {
        return $this->hasMany('App\Riwayat', 'pembeli_id');
    }
}
