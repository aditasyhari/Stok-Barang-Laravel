<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\modal;
use Carbon\Carbon;

class ModalController extends Controller
{
    public function grafik()
    {
        $modals = \App\modal::all();

        $categories = [];
        $data = [];

        foreach($modals as $modal){
            $categories[] = $modal->bulan;
            $data[] = $modal->modal;
        }

        return view('/keuangan/grafik',['modals' => $modals, 'categories' => $categories, 'data' => $data]);
    }

    public function tambah(Request $request)
    {
        $modal = modal::find($request->id_bulan);
        $modal->update([
            'modal'=>$request->modal,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        return redirect('/keuangan/grafik')->with('sukses','Modal Berhasil Ditambahkan');
    }

    public function hapus()
    {
        DB::table('modals')->update(['modal'=>0]);
        return redirect('/keuangan/grafik');
    }

    public function hapus_bulan(Request $request)
    {
        $modal = modal::find($request->id_bulan);
        $modal->update(['modal'=>0]);
        return redirect('/keuangan/grafik');
    }
}
