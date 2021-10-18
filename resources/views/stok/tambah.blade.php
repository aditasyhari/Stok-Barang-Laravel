@extends('template.app')

@section('title')
Buat Barang Baru
@endsection

@section('content')

<h1 class="text-center my-2 my-lg-3">Tambah Barang</h1>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Tambahkan Barang Baru</div>

            <div class="card-body">
            <form action="\simpan-barang">
                @csrf
                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Nama Barang :</p>
                        <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Asal Barang :</p>
                        <input type="text" class="form-control" placeholder="Asal Barang" name="asal_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Harga Beli(kg) :</p>
                        <input type="text" class="form-control" placeholder="Harga Beli" name="harga_beli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Harga Jual(kg) :</p>
                        <input type="text" class="form-control" placeholder="Harga Jual" name="harga_jual">
                    </div> 
                    
                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Kode Barang : <br><span class="text-secondary">otomatis ?</span> <input id="kode-check" type="checkbox" onclick="kodeCheck()" checked></p>
                        
                        <input type="text" class="form-control" placeholder="Kode Barang" id="kode-barang" disabled>
                    </div> 
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-5"> Simpan </button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
function kodeCheck() {
    var checkbox = document.getElementById("kode-check");
    var kodeBarang = document.getElementById("kode-barang");

    if(checkbox.checked == true) {
        kodeBarang.removeAttribute("name");
        kodeBarang.setAttribute("disabled", "");
    } else {
        kodeBarang.setAttribute("name", "kode_barang");
        kodeBarang.removeAttribute("disabled");
    }
}
</script>
@endsection