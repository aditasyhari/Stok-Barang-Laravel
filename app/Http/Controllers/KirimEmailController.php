<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;//php artisan make:mail SendMail
use Illuminate\Support\Facades\Mail;
use App\Riwayat;
use App\data_pembeli;

class KirimEmailController extends Controller
{
    //

    public function kirim_nota($id) {
        $riwayat = Riwayat::find($id);
        $pembeli = data_pembeli::find($riwayat->pembeli_id);

        // dd($pembeli->email_pembeli);

        Mail::to($pembeli->email_pembeli)->send(new SendMail($riwayat));

        return back()->with('status', 'Nota berhasil dikirim ke email pembeli !!');
    }
}
