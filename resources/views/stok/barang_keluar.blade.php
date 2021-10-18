@extends('layouts.app')

@section('title')
Stok Barang - Barang Keluar
@endsection

@section('content')
<h1 class="mb-5">Barang Keluar<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
<br>
<table id="table" class="table table-hover">
    <div id="outside" class="mb-3"></div>
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pembeli</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah Barang(kg)</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembelians as $p)
        <tr>
            <?php
                $r = \App\Riwayat::find($p->riwayat_id);
                $u = \App\data_pembeli::find($r->pembeli_id);
            ?>
            <td>{{$loop->iteration}}</td>
            <td>{{$r->tanggal_pembelian}}</td>
            <td>{{$u->nama_pembeli}}</td>
            <td>{{$p->nama_barang}}</td>
            <td>{{$p->jumlah}}</td>
            <td>Rp {{number_format($p->total, 0, ",", ".")}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            buttons: [
                    
                {
                    extend:    'copy',
                    text:      '<i class="fa fa-copy"></i>',
                    titleAttr: 'Copy',
                    className: 'btn btn-md btn-copy'
                },
                {
                    extend:    'excel',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    className: 'btn btn-md btn-excel'
                },
                {
                    extend:    'pdf',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF',
                    className: 'btn btn-md btn-pdf'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    className: 'btn btn-md btn-print'
                },
                {
                    extend:    'colvis',
                    text:      '<i class="fa fa-eye"></i>',
                    titleAttr: 'Visibility',
                    className: 'btn btn-md  btn-colvis'
                },

            ],

            lengthChange: true,
            searching: true

        })
        .buttons()
        .container()
        .appendTo("#outside");
    });
</script>
@endsection