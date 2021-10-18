<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Dashboard
Route::get('/dashboard/dashboard', 'DashboardController@index');
Route::post('/filterdata','DashboardController@filter');

Route::get('/filterdata','DashboardController@filter');

//Data Transaksi
Route::get('/data_transaksi/data_transaksi', 'TransaksiController@index');
Route::post('/data_transaksi/data_transaksi/tambah-stok', 'BarangMasukController@store')->name('tambahStok');
Route::get('/data_transaksi/data_transaksi/chart-stok', 'TransaksiController@chartStok')->name('chartStok');

//Stok Barang
Route::get('/stok/stok_barang', 'StokController@index');
Route::get('/stok/tambah', 'StokController@tambah');
Route::get('/stok/barang_keluar','StokController@keluar');
Route::get('/simpan-barang', 'StokController@simpan');
Route::get('/stok/stok_barang/cari','StokController@cari');
Route::get('/stok/{stok}/delete', 'StokController@hapus_stok');
Route::get('stok/{stok}/show','StokController@show');
Route::get('/stok/{stok}/ubah', 'StokController@ubah_barang');
Route::get('/stok/{stok}/update_barang', 'StokController@update_barang');
//Route::get('/stok/{stok_barang}/detail','StokController@detail');

//Keuangan
Route::get('/keuangan/data_pembeli', 'KeuanganController@index');
Route::get('/keuangan/{pembeli}/riwayat','KeuanganController@riwayat');
Route::get('/keuangan/{pembeli}/riwayat/{riwayat}/detail','KeuanganController@detail_riwayat')->name('detailRiwayat');
Route::post('/keuangan/riwayat/{riwayat}/update','KeuanganController@update_riwayat')->name('updateRiwayat');
Route::get('/keuangan/tambahpembeli','KeuanganController@tambah');
Route::get('/simpan-pembeli','KeuanganController@simpan_pembeli');
Route::get('/keuangan/{pembeli}/delete', 'KeuanganController@hapus');
Route::get('keuangan/{pembeli}/show','KeuanganController@show_pembeli');
Route::get('/keuangan/{pembeli}/ubah', 'KeuanganController@ubah_pembeli');
Route::get('/keuangan/{pembeli}/update_pembeli', 'KeuanganController@update_pembeli');
Route::get('/keuangan/data_pembeli/search','KeuanganController@search');

//Grafik
Route::get('/keuangan/grafik', 'ModalController@grafik');
Route::get('/modal/tambah', 'ModalController@tambah');
Route::get('/modal/hapus', 'ModalController@hapus');
Route::post('/modal/hapus/bulan', 'ModalController@hapus_bulan');

//Kasir
Route::get('/kasir/kasir','RiwayatController@index');
Route::post('/kasir/kasir','RiwayatController@store');

//Kirim Email
Route::get('/kirim-nota/{riwayat}/riwayat', 'KirimEmailController@kirim_nota')->name('kirimNota');

//Sekertaris
Route::group(['middleware'=>'admin'], function() {
    Route::resource('sekertaris', 'SekertarisController');
});
Route::post('/register', 'SekertarisController@store')->name('registerUser');
Route::get('/profile', 'SekertarisController@editProfile')->name('editProfile');
Route::post('/profile', 'SekertarisController@updateProfile')->name('updateProfile');

// Route::get('/tes',function(){return view('tes');});

// Cetak Laporan
Route::get('/cetak_stok','LaporanController@stok_pdf');
Route::get('/cetak_total','LaporanController@total_pdf');

