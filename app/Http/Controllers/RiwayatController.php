<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_pembeli;
use App\stok_barang;
use App\Pembelian;
use App\Riwayat;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_pembelis=data_pembeli::all();
        $stok_barangs=stok_barang::where('jumlah_barang', '>', 0)->get();
        return view('kasir.kasir',compact('data_pembelis','stok_barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $riwayat = Riwayat::create([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'total_pembelian' => $request->total_pembelian,
            'dibayar' => $request->dibayar,
            'kembali' => $request->kembali,
            'hutang' => $request->hutang,
            'catatan' => $request->catatan,
            'pembeli_id' => $request->pembeli_id,
            'nama_kasir' => $request->nama_kasir,
            // 'kasir_id' => $request->kasir_id,
        ]);

        foreach($request->pembelian_barang as $p) {
            $a = str_replace("['", '', $p);
            $a = str_replace("']", '', $a);
            $b = explode("', '", $a);

            $stok = stok_barang::find($b[0]);
            $newJumlah = $stok->jumlah_barang - (int)$b[1];
            $stok->update([
                'jumlah_barang' => $newJumlah
            ]);

            Pembelian::create([
                'riwayat_id' => $riwayat->id,
                'kode_barang' => $stok->kode_barang,
                'nama_barang' => $stok->nama_barang,
                'harga' => $stok->harga_jual,
                'jumlah' => $b[1],
                'total' => $b[2],
            ]);
        }

        return back()->with('status', 'Data pembelian berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
