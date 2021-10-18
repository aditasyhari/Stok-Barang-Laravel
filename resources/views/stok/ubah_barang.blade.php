@extends('layouts.app')

@section('title')
Ubah Data Barang
@endsection

@section('content')
<div class="content">

</div>

<h1 class="text-center my-5">Ubah Data Barang</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Ubah Data Barang</div>

            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger">
                    <div class="list-group">
                        @foreach($errors->all() as $error)
                         <li class="list-group-item">
                            {{$error}}
                         </li>
                         @endforeach
                    </div>
                </div>
                @endif

                <form action="/stok/{{$stok->id}}/update_barang">
                @csrf
                    <div class="form-group">
                    <p class="font-weight-bold">Nama Barang :</p>
                        <input type="text" class="form-control" value="{{$stok->nama_barang}}" placeholder="Nama Barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Asal Barang :</p>
                        <input type="text" class="form-control" value="{{$stok->asal_barang}}" placeholder="Asal Barang" name="asal_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Harga_beli :</p>
                        <input type="text" class="form-control" value="{{$stok->harga_beli}}" placeholder="Harga Beli" name="harga_beli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Harga_jual :</p>
                        <input type="text" class="form-control" value="{{$stok->harga_jual}}" placeholder="Keterangan" name="harga_jual">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Kode Barang :</p>
                        <input type="text" class="form-control" value="{{$stok->kode_barang}}" placeholder="Kode Barang" name="kode_barang">
                    </div>
  

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-5"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>

@endsection  