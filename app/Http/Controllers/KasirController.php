<?php

namespace App\Http\Controllers;

use App\data_pembeli;
use App\riwayat_pembelian;
use App\stok_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function index()
    {   
        $data_pembelis=data_pembeli::all();
        $stok_barangs=stok_barang::all();
        return view('kasir.kasir',compact('data_pembelis','stok_barangs'));
    }

    public function tambah()
    {
       $riwayat_pembelians=riwayat_pembelian::created([
           'tanggal_pembelian'=>'required',
           'dibayar'=>'required',
           'kembali'=>'required',
           'sisa'=>'required',
           'catatan'=>'required',
           'stok_barang_id'=>$this->stok_barangs,
           'jumlah'=> 1
       ]);
       $riwayat_pembelians->total_pembelian = $riwayat_pembelians->stok_barangs->harga_jual;
       $riwayat_pembelians->save();
    }
}
