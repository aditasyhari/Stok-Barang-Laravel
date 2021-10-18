@extends('template.app')

@section('title')
Detail Pembelian
@endsection

@section('content')
        <h1 class="text-center mt-2 mb-5">
            {{$pembeli->nama_pembeli}} - Detail Pembelian
        </h1>

        <div class="row">
            <div class="col-lg">
                <div class="form-group">
                    <label for="sisa"  class="font-weight-bold">Tanggal Pembelian</label>
                    <input type="text" value="{{$riwayat->tanggal_pembelian}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="sisa"  class="font-weight-bold">Total Pembelian</label>
                    <input type="hidden" id="total-pembelian" value={{$riwayat->total_pembelian}}>
                    <input type="text" value="Rp {{number_format($riwayat->total_pembelian, '0', ',', '.')}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="sisa"  class="font-weight-bold">Dibayar</label>
                    <input type="hidden" id="dibayar" value={{$riwayat->dibayar}}>
                    <input type="text" value="Rp {{number_format($riwayat->dibayar, '0', ',', '.')}}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-lg">
                <form action="{{ route('updateRiwayat', ['riwayat'=>$riwayat->id]) }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="sisa"  class="font-weight-bold">Catatan</label>
                        <textarea name="catatan" class="form-control" cols="30" rows="8">{{$riwayat->catatan}}</textarea>
                    </div>
            </div>
            <div class="col-lg">
                    <div class="form-group">
                        <label for="sisa"  class="font-weight-bold">Bayar Hutang</label>
                        <input type="number" name="bayar_hutang" id="bayar-hutang" value=0 min="0" class="form-control" {{ ($riwayat->hutang == 0) ? 'disabled' : '' }} required>
                    </div>
                    <div class="form-group">
                        <label for="sisa"  class="font-weight-bold">Hutang</label>
                        <input type="number" name="hutang" id="hutang" value="{{$riwayat->hutang}}" min="0" class="form-control" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <br/>

        <table id="table" class="table table-hover">
            <div class="mb-3" id="outside"></div>
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayat->pembelian as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->kode_barang}}</td>
                    <td>{{$p->nama_barang}}</td>
                    <td>{{$p->jumlah}}</td>
                    <td>Rp {{number_format($p->harga, 0, ",", ".")}}</td>
                    <td>Rp {{number_format($p->total, 0, ",", ".")}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{ route('kirimNota', ['riwayat'=>$riwayat->id]) }}" class="btn btn-primary">Kirim Email</a>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>

@endsection
@section('js')
@if(session('status'))
    <script>
        $(function() {
            $('#staticBackdrop').modal('show');
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Berhasil !!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                {{ session('status') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
@endif
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            order: [[ 0, "desc" ]],
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
                    className: 'btn btn-md btn-print',
                    exportOptions: {
                        columns: ':visible',
                    },
                    customize: function (win) {
                        $(win.document.body).find('table').addClass('display').css('font-size', '12px');
                        data = '<tr class="text-center"><td></td><td colspan="2">Email : {{$pembeli->email_pembeli}}</td><td colspan="2">Nama : {{$pembeli->nama_pembeli}}</td><td></td></tr>';
                        data += '<tr class="font-weight-bold"><td></td><td class="text-right" colspan="4">Total Pembelian :</td><td>Rp {{number_format($riwayat->total_pembelian, 0, ",", ".")}}</td></tr>';
                        data += '<tr class="font-weight-bold"><td></td><td class="text-right" colspan="4">Dibayar :</td><td>Rp {{number_format($riwayat->dibayar, 0, ",", ".")}}</td></tr>';
                        data += '<tr class="font-weight-bold"><td></td><td class="text-right" colspan="4">Kembali :</td><td>Rp {{number_format($riwayat->kembali, 0, ",", ".")}}</td></tr>';
                        data += '<tr class="font-weight-bold"><td></td><td class="text-right" colspan="4">Hutang :</td><td>Rp {{number_format($riwayat->hutang, 0, ",", ".")}}</td></tr>';
                        data += '<tr class=""><td colspan="4"><span class="font-weight-bold">Tanggal Pembelian :</span> {{$riwayat->tanggal_pembelian}}<br><span class="font-weight-bold">Catatan :</span> {{$riwayat->catatan}}</td></tr>';
                        $(win.document.body).find('tr:last').after(data);
                        $(win.document.body).find('h1').css('text-align','center').html("UD Wangi Agung").css('margin-bottom','50px');
                    }
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

    var total_pembelian = parseInt(document.getElementById('total-pembelian').value);
    var bayar = parseInt(document.getElementById('dibayar').value);
    var bayar_hutang = document.getElementById('bayar-hutang')
    var hutang = document.getElementById('hutang');

    bayar_hutang.onkeyup = function() {
        if(Math.sign(parseInt(bayar_hutang.value) + bayar - total_pembelian) == -1) {
            hutang.value = parseInt(bayar_hutang.value) + bayar - total_pembelian;
            hutang.innerHTML = parseInt(bayar_hutang.value) + bayar - total_pembelian;
        } else {
            hutang.value = 0;
            hutang.innerHTML = 0;
        }
    };
</script>
@endsection