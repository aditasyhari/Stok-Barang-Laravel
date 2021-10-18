@extends('template.app')

@section('title')
Data Pembeli
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
    <h1>Data Pembeli<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    <p class="font-italic">data berikut menampilkan data pembeli</p>
    <br>

    <table id="table" class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Email</th>
                <th scope="col">Kode Pembeli</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_pembelis as $pembeli)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$pembeli->nama_pembeli}}</td>
                    <td>{{$pembeli->alamat_pembeli}}</td>
                    <td>{{$pembeli->nomor_hp}}</td>
                    <td>{{$pembeli->email_pembeli}}</td>
                    <td>{{$pembeli->kode_pembeli}}</td>
                <td>
                <a href="/keuangan/{{$pembeli->id}}/riwayat" class="btn btn-success btn-sm">Riwayat</a>
                </td>
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
                    
                // {
                //     extend:    'copy',
                //     text:      '<i class="fa fa-copy"></i>',
                //     titleAttr: 'Copy',
                //     className: 'btn btn-md btn-copy'
                // },
                // {
                //     extend:    'excel',
                //     text:      '<i class="fa fa-file-excel-o"></i>',
                //     titleAttr: 'Excel',
                //     className: 'btn btn-md btn-excel'
                // },
                // {
                //     extend:    'pdf',
                //     text:      '<i class="fa fa-file-pdf-o"></i>',
                //     titleAttr: 'PDF',
                //     className: 'btn btn-md btn-pdf'
                // },
                // {
                //     extend:    'print',
                //     text:      '<i class="fa fa-print"></i>',
                //     titleAttr: 'Print',
                //     className: 'btn btn-md btn-print'
                // },
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