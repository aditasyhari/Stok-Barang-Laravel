<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\stok_barang;
Use App\Pembelian;
use Illuminate\Support\Facades\DB;


class StokController extends Controller
{
    public function index()
    {
        $stok_barangs = DB::table('stok_barangs')->orderBy('created_at','desc')->get();
        return view('/stok/stok_barang',['stok_barangs' => $stok_barangs]);
    }

    public function tambah()
    {
        return view('/stok/tambah');
    }

    public function keluar()
    {
        $pembelians = Pembelian::orderBy('id', 'desc')->get();
        return view('/stok/barang_keluar', compact(['pembelians']));
    }

    public function simpan(Request $request)
    {
        if(isset($request->kode_barang)) {
            $this->validate($request,[
                'nama_barang'=>'required',
                'asal_barang'=>'required' ,
                'harga_beli'=>'required',
                'harga_jual'=>'required',
                'kode_barang'=>'required',
            ]);

            stok_barang::create($request->all());
            session()->flash('success', 'data berhasil disimpan');
    
            return redirect('/stok/stok_barang');
        } else {
            $this->validate($request,[
                'nama_barang'=>'required',
                'asal_barang'=>'required' ,
                'harga_beli'=>'required',
                'harga_jual'=>'required',
            ]);

            $cari = "UDWA";
            $max_no = stok_barang::where('kode_barang','like',"%".$cari."%")->max('kode_barang');
            
            if($max_no == null) {
                $kode_barang = "UDWA_1";
            } else {
                $kode_barang = (int)substr($max_no, 5);
                $kode_barang += 1;
                $kode_barang = "UDWA_".$kode_barang;
            }

            // dd($kode_barang);
            stok_barang::create([
                'nama_barang' => $request->nama_barang,
                'asal_barang' => $request->asal_barang,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'kode_barang' => $kode_barang,
            ]);

            session()->flash('success', 'data berhasil disimpan');
    
            return redirect('/stok/stok_barang');
        }

    }

    public function cari(Request $request)
    {
	// menangkap data pencarian
	$cari = $request->cari;
 
 	// mengambil data dari table pegawai sesuai pencarian data
	$stok_barangs = DB::table('stok_barangs')
	->where('nama_barang','like',"%".$cari."%")
	->paginate();
 
        return view('/stok/stok_barang',['stok_barangs' => $stok_barangs]);
 
    }

    public function show($id)
    {
        $stok = stok_barang::find($id);
        $pembelians = Pembelian::where('kode_barang', $stok->kode_barang)->orderBy('created_at', 'desc')->get();
        return view('stok.detail_barang', compact(['stok', 'pembelians']));
    }

    public function hapus_stok($id)
    {
        $data=stok_barang::find($id);

        $data->delete();

        session()->flash('success', 'data berhasil dihapus');

        return redirect('/stok/stok_barang');
    }

    public function ubah_barang($id)
    {
    return view('stok.ubah_barang')->with('stok', stok_barang::find($id));
    }

    public function update_barang($id)
    {
        $this->validate(request(),[
            'nama_barang'=>'required',
            'asal_barang'=>'required' ,
            'harga_beli'=>'required',
            'harga_jual'=>'required',
            'kode_barang'=>'required', 
        ]);

        $data=request()->all();
        $table=stok_barang::find($id);
        $table->nama_barang=$data["nama_barang"];
        $table->asal_barang=$data["asal_barang"];
        $table->harga_beli=$data["harga_beli"];
        $table->harga_jual=$data["harga_jual"];
        $table->kode_barang=$data["kode_barang"];

        $table->save();

        session()->flash('success', 'data berhasil diupdate');

        return redirect('/stok/stok_barang');
    }

}
