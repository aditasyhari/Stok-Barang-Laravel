<?php

namespace App\Http\Controllers;

use App\data_pembeli;
use App\riwayat_pembelian;
use App\stok_barang;
Use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class LaporanController extends Controller
{
    public function stok_pdf()
    {
        $stok_barangs = DB::table('stok_barangs')->orderBy('created_at','desc')->get();

    	$pdf = PDF::loadview('laporan.stok_pdf',['stok_barangs'=>$stok_barangs]);
    	return $pdf->stream('laporan-barang.pdf');
    }

    public function total_pdf()
    {
        $stok_barangs = DB::table('stok_barangs')->orderBy('created_at','desc')->get();
        
        $pdf = PDF::loadview('laporan.total_pdf',['stok_barangs'=>$stok_barangs]);
        return $pdf->stream('laporan-stok.pdf');
    }
}
