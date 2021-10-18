<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\data_pembeli;
use App\riwayat_pembelian;
use App\stok_barang;
use App\BarangMasuk;
Use App\Pembelian;

class TransaksiController extends Controller
{
    public function index()
    {
        $stok_barangs = stok_barang::all();
        $count = stok_barang::count();
        $total = stok_barang::sum('jumlah_barang');
        $pembelians = Pembelian::orderBy('id', 'desc')->get();
        $barang_masuk = BarangMasuk::orderBy('tanggal_masuk', 'desc')->get();

        return view('/data_transaksi/data_transaksi', compact(['pembelians','stok_barangs','count','total','barang_masuk']));   
    }

    public function chartStok() 
    {
        $stok = stok_barang::all();

        $data = [];

        foreach($stok as $s){
            $barang_keluar = Pembelian::where('kode_barang', $s->kode_barang)->get();

            if($barang_keluar->count() > 0) {
                $keluar = $barang_keluar->sum('jumlah');
            } else {
                $keluar = 0;
            }
            
            $data[] = [$s->nama_barang, $keluar];
        }

        return view('data_transaksi.stok-chart', compact(['data']));
    }
}
