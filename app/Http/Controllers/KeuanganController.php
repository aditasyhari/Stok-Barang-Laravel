<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_pembeli;
use App\Riwayat;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function index()
    {
        $data_pembelis = DB::table('data_pembelis')->paginate(5);
        

        return view('/keuangan/data_pembeli',['data_pembelis' => $data_pembelis]);
    }

    public function tambah()
    {
        return view('/keuangan/tambahpembeli');
    }

    public function simpan_pembeli(Request $request)
    {
        if(isset($request->kode_pembeli)) {
            $this->validate($request,[
                'nama_pembeli'=>'required',
                'alamat_pembeli'=>'required' ,
                'nomor_hp'=>'required',
                'email_pembeli'=>'required',
                'kode_pembeli'=>'required'
            ]);

            data_pembeli::create($request->all());
            session()->flash('success', 'data berhasil disimpan');

            return redirect('/keuangan/data_pembeli');
        } else {
            $this->validate($request,[
                'nama_pembeli'=>'required',
                'alamat_pembeli'=>'required' ,
                'nomor_hp'=>'required',
                'email_pembeli'=>'required'
            ]);

            $cari = "NAMA";
            $max_no = data_pembeli::where('kode_pembeli','like',"%".$cari."%")->max('kode_pembeli');

            if($max_no == null) {
                $kode_pembeli = "NAMA_1";
            } else {
                $kode_pembeli = (int)substr($max_no, 5);
                $kode_pembeli += 1;
                $kode_pembeli = "NAMA_".$kode_pembeli;
            }

            data_pembeli::create([
                'nama_pembeli' => $request->nama_pembeli,
                'alamat_pembeli' => $request->alamat_pembeli,
                'nomor_hp' => $request->nomor_hp,
                'email_pembeli' => $request->email_pembeli,
                'kode_pembeli' => $kode_pembeli
            ]);

            session()->flash('success', 'data berhasil disimpan');

            return redirect('/keuangan/data_pembeli');
        }
    }

    public function search(Request $request)
    {
	// menangkap data pencarian
	$search = $request->search;
 
 	// mengambil data dari table pegawai sesuai pencarian data
	$data_pembelis = DB::table('data_pembelis')
	->where('nama_pembeli','like',"%".$search."%")
	->paginate();
 
    	// mengirim data pegawai ke view index
        return view('/keuangan/data_pembeli',['data_pembelis' => $data_pembelis]);
 
    }

    public function hapus($id)
    {
        $data=data_pembeli::find($id);

        $data->delete();

        session()->flash('success', 'data berhasil dihapus');

        return redirect('/keuangan/data_pembeli');
    }

    public function riwayat($id)
    {
        $pembeli = data_pembeli::find($id);
        return view('keuangan.riwayat', compact(['pembeli']));
    }

    public function detail_riwayat($id_pembeli, $id_riwayat)
    {
        $pembeli = data_pembeli::find($id_pembeli);
        $riwayat = Riwayat::find($id_riwayat);
        
        return view('keuangan.detail-riwayat', compact(['pembeli', 'riwayat']));
    }

    public function update_riwayat(Request $request, $id_riwayat) {
        $riwayat = Riwayat::find($id_riwayat);
        $dibayar = $riwayat->dibayar + $request->bayar_hutang;

        $riwayat->update([
            'catatan' => $request->catatan,
            'dibayar' => $dibayar,
            'hutang' => $request->hutang
        ]);

        return back()->with('status', 'Data berhasil diperbarui !!');
    }

    public function ubah_pembeli($id)
    {
    return view('keuangan.ubah_pembeli')->with('pembeli', data_pembeli::find($id));
    }

    public function update_pembeli($id)
    {
        $this->validate(request(),[
            'nama_pembeli'=>'required',
            'alamat_pembeli'=>'required' ,
            'nomor_hp'=>'required',
            'email_pembeli'=>'required' 
        ]);

        $data=request()->all();
        $table=data_pembeli::find($id);
        $table->nama_pembeli=$data["nama_pembeli"];
        $table->alamat_pembeli=$data["alamat_pembeli"];
        $table->nomor_hp=$data["nomor_hp"];
        $table->email_pembeli=$data["email_pembeli"];

        $table->save();

        session()->flash('success', 'data berhasil diupdate');

        return redirect('/keuangan/data_pembeli');
    }
}
