@extends('template.app')

@section('title')
Detail Barang
@endsection

@section('css')
<style>
.main-panel {
    min-height: 100vh; 
}
</style>
@endsection

@section('content')
<div class="content">

    <h1 class="text-center my-5">
        {{$stok->nama_barang}}
    </h1>
    <br/>
    <div id=""></div>
    <table id="" class="table table-hover">
        <thead class="thead-light">
            <tr>
            <th scope="col">Asal Barang</th>
            <th scope="col">Jumlah Barang(kg)</th>
            <th scope="col">Harga Beli(kg)</th>
            <th scope="col">Harga Jual(kg)</th>
            <th scope="col">Kode Barang</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{$stok->asal_barang}}</td>
            <td>{{$stok->jumlah_barang}}</td>
            <td>@currency($stok->harga_beli)</td>
            <td>@currency($stok->harga_jual)</td>
            <td>{{$stok->kode_barang}}</td>
            </tr>
        </tbody>
    </table>

    <div class="mb-3">
        <a href="/stok/{{$stok->id}}/ubah" class="btn btn-primary">Ubah</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusdiagram">Hapus</button>

        <div class="modal fade" id="hapusdiagram" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Barang?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="/stok/{{$stok->id}}/delete" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
    </div>
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

</div>

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

            ],

            lengthChange: false,
            searching: false

        })
        .buttons()
        .container()
        .appendTo("#outside");

    });
</script>
@endsection