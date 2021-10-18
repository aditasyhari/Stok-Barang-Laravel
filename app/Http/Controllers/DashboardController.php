<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\data_pembeli;
use App\Riwayat;
use App\stok_barang;
use App\BarangMasuk;
Use App\Pembelian;

class DashboardController extends Controller
{
    public function index()
    {
        $stok_barangs = stok_barang::all();
        $count = stok_barang::count();
        $total = stok_barang::sum('jumlah_barang');
        $pembelians = Pembelian::orderBy('id', 'desc')->get();
        $barang_masuk = BarangMasuk::sum('jumlah');
        $total_keluar = Pembelian::sum('jumlah');

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
        

        return view('/dashboard/dashboard', compact(['pembelians','stok_barangs','count','total','barang_masuk','total_keluar','data']));   
    }

    public function filter(Request $request)
    {

        $count = stok_barang::whereBetween('created_at', [$request->tglawal." 00:00:00", $request->tglakhir." 23:59:59"])->count();
        $total = stok_barang::whereBetween('created_at', [$request->tglawal." 00:00:00", $request->tglakhir." 23:59:59"])->sum('jumlah_barang');
        $barang_masuk = BarangMasuk::whereBetween('tanggal_masuk', [$request->tglawal, $request->tglakhir])->sum('jumlah');
        $total_keluar = Pembelian::whereBetween('created_at', [$request->tglawal." 00:00:00", $request->tglakhir." 23:59:59"])->sum('jumlah');

        $stok = stok_barang::all();

        $datatable = [];

        foreach($stok as $s){
            $barang_keluar = Pembelian::whereBetween('created_at', [$request->tglawal." 00:00:00", $request->tglakhir." 23:59:59"])
            ->where('kode_barang', $s->kode_barang)->get();

            if($barang_keluar->count() > 0) {
                $keluar = $barang_keluar->sum('jumlah');
            } else {
                $keluar = 0;
            }
            
            $datatable[] = [$s->nama_barang, $keluar];
        }

        switch ($request->pilihfilter) {
            case "Jumlah Barang":
                $data = ["count"=>$count];
                break;

            case "Stok Barang":
                $data = ["total"=>$total];
                break;

            case "Barang Masuk":
                $data = ["barang_masuk"=>$barang_masuk];
                break;

            case "Total Keluar":
                $data = ["total_keluar"=>$total_keluar];
                break;
            case "Barang Diminati":
                $data = ["datatable"=>$datatable];
                break;
            case "Semua":
                $data = ["total_keluar"=>$total_keluar,
                        "barang_masuk"=>$barang_masuk,
                        "total"=>$total,
                        "count"=>$count,
                        "datatable"=>$datatable
            ];
                break;

            default:
                
                break;
        }

        return response()->json($data);
    }
}
