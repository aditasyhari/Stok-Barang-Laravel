@extends('template.app')

@section('title')
Ubah Data Pembeli
@endsection

@section('content')

<h1 class="text-center my-5">Ubah Data Pembeli</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Ubah Data Pembeli</div>

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

                <form action="/keuangan/{{$pembeli->id}}/update_pembeli">
                @csrf
                    <div class="form-group">
                    <p class="font-weight-bold">Nama Pembeli :</p>
                        <input type="text" class="form-control" value="{{$pembeli->nama_pembeli}}" placeholder="Nama Pembeli" name="nama_pembeli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Alamat Pembeli :</p>
                        <input type="text" class="form-control" value="{{$pembeli->alamat_pembeli}}" placeholder="Alamat Pembeli" name="alamat_pembeli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Nomor HP :</p>
                        <input type="text" class="form-control" value="{{$pembeli->nomor_hp}}" placeholder="Nomor HP" name="nomor_hp">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Email Pembeli :</p>
                        <input type="text" class="form-control" value="{{$pembeli->email_pembeli}}" placeholder="Email Pembeli" name="email_pembeli">
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