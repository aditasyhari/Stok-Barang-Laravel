@extends('template.app')

@section('title')
Data Sekertaris
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
    <h1 class="mb-5">Data Sekertaris<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    <br>

    <table id="table" class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sekertaris as $s)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->email}}</td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$s->id}}">Hapus</button>

                    <div class="modal fade" id="hapus{{$s->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Yakin hapus user {{$s->name}} ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('sekertaris.destroy', ['sekertari'=>$s->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

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
        $('#table').DataTable();
    });
</script>
@endsection