<?php

namespace App\Http\Controllers;

use App\Riwayat;
use Carbon\Carbon;
use App\BarangMasuk;
use App\stok_barang;
use App\data_pembeli;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function filter_bk(Request $request)
    {
        $barang_keluar = Pembelian::where('kode_barang', $request->filter_bk)
                        ->whereBetween('created_at', [$request->tglawal, $request->tglakhir])
                        ->select([
                            DB::raw('sum(jumlah) as daily'),
                            DB::raw('date(created_at) as date'),
                        ])
                        ->groupBy('date')
                        ->pluck('daily', 'date');

        // $period = new CarbonPeriod('2021-08-10', '1 day', '2021-10-28');

        // // Fill zeroes
        // foreach ($period as $date) {
        //     if (!isset($barang_keluar[$date->toDateString()])) {
        //         $barang_keluar[$date->toDateString()] = 0;
        //     }
        // }

        // // Convert to associative array
        // $barang_keluar = $barang_keluar->values()->toArray();

        $datatable = [];
        foreach($barang_keluar as $key => $bk) {
            // $tgl = date_format($key, 'd/m/y');
            $datatable[] = [$key, intval($bk)];
        }

        // dd($datatable);
        // $data = ["datatable"=>$datatable];
        return response()->json($datatable);
    }
}
