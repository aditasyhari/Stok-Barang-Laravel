

<?php $__env->startSection('title'); ?>
Kasir
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
    .select2-selection__arrow {
        display: none;
    }

    .select2-container .select2-selection--single {
        max-width: 290px !important; 
        height: calc(1.5em + .75rem + 2px) !important;
        padding: .375rem .50rem !important;
    }

    .select2-container, .select2-container--default, .select2-container--open {
        width: 100% !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
<h2 class="text-center my-1">Pembelian Barang</h2>

<form id="kasir-form" action="<?php echo e(url('/kasir/kasir')); ?>" method="POST">
<?php echo csrf_field(); ?>
<div class="row mt-3">
    <div class="col-lg-4 bg-white">
        <div class="box box-widget my-3">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top">
                            <label for="date" class="font-weight-bold">Tanggal</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date" id="date" value="<?=date('y-m-d')?>" class="form-control" name="tanggal_pembelian" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">
                            <label for="user" class="font-weight-bold">Kasir</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" value="<?=Auth::user()->name?>" class="form-control" readonly>
                                <input type="hidden" id="user" value="<?=Auth::user()->name?>" name="nama_kasir" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">
                            <label for="customer" class="font-weight-bold">Pembeli</label>
                        </td>
                        <td>
                            <div>
                                <select id="pembeli" class="form-control" name="pembeli_id" required>
                                    <option>-- Pilih Pembeli --</option>
                                    <?php $__currentLoopData = $data_pembelis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembeli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($loop->iteration); ?>

                                        <option value="<?php echo e($pembeli->id); ?>"><?php echo e($pembeli->nama_pembeli); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 bg-white">
        <div class="box box-widget my-3">
            <div class="box-body">
                <table width="100%">
                    <tr>
                    <td style="vertical-align:top: width:30%">
                            <label for="kode_barang" class="font-weight-bold">Kode Barang</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                
                                <!-- <input type="text" id="barcode" class="form-control" autofocus> -->
                                <select class="js-example-basic-single form-control" name="barang" id="barang">
                                    <option selected disabled>Cari..</option>
                                    <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="['<?php echo e($b->id); ?>', '<?php echo e($b->kode_barang); ?>', '<?php echo e($b->nama_barang); ?>', '<?php echo e($b->harga_jual); ?>']"><?php echo e($b->kode_barang); ?> - <?php echo e($b->nama_barang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <!-- <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">
                            <label for="jumlah" class="font-weight-bold">Jumlah</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="jumlah" value="1" min="1" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <div>
                                <button type="button" id="add_cart" class="btn btn-primary" onclick="tambah()">
                                    <i class="fa fa-cart-plus mr-2"></i> Tambah
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 bg-white">
        <div class="box box-widget my-3">
            <div class="box-body">
                <div align="right">
                    <h4>Total Pembelian</h4>
                    <input type="hidden" name="total_pembelian" id="input_total" value=0>
                    <h1><b><span id="total_pembelian" style="font-size:50pt">Rp 0</span></b></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-2 bg-white">
    <div class="col-lg-12 mt-3">
        <div class="box box-widget">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Barang</th>
                        <th style="width: 200px;">Total</th>
                        <th style="width: 10px;"></th>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-3 bg-white">
        <div class="box box-widget my-3">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top: width:30%">
                            <label for="bayar"  class="font-weight-bold">Bayar</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="dibayar" id="bayar" value="0" min="0" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">
                            <label for="kembali"  class="font-weight-bold">Kembali</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="kembali" id="kembali" value="0" min="0" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">
                            <label for="sisa"  class="font-weight-bold">Hutang</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="hutang" id="sisa" value="0" min="0" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-3 bg-white">
        <div class="box box-widget my-3">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top" class="">
                            <label for="catatan" class="font-weight-bold mr-2">Catatan</label>
                        </td>
                        <td>
                         <div>
                            <textarea id="catatan" rows="3" name="catatan" class="form-control"></textarea>
                         </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div>
            <button type="button" class="btn btn-flat btn-warning" onclick="batal()">
                <i class="fa fa-refresh mr-2"></i> Batal
            </button><br><br>
            <button type="button" id="process_payment" class="btn btn-flat btn-lg btn-success" onclick="proses()">
                <i class="fa fa-paper-plane-o mr-2"></i> Proses Pembelian
            </button>
        </div>
    </div>
</div>
</form>

<!-- Modal Peringatan -->
<div class="modal fade" id="nullAlert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="nullAlertLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nullAlertLabel">Peringatan !!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h1 class="text-warning" style="font-size: 100px;">
                    <i class="fa fa-exclamation-circle"></i>
                </h1>
                <h5>Tambahkan barang terlebih dahulu !!</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmAlert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="confirmAlertLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmAlertLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah data sudah benar ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-success" onclick="formSubmit()">Ya</button>
            </div>
        </div>
    </div>
</div>

</body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php if(session('status')): ?>
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
                <?php echo e(session('status')); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

    });

    var table = $("#table");

    var total_pembelian = 0;
    var pembelian_total = document.getElementById('total_pembelian');
    var input_total = document.getElementById('input_total');

    var no = 1;
    function tambah() {
        var barang = document.getElementById('barang').value;
        barang = barang.replace(/^\[\'|\'\]$/g,'').split("', '");
        var jumlah = document.getElementById('jumlah').value;
        var id_barang = barang[0];
        var kode_barang = barang[1];
        var nama_barang = barang[2];
        var harga_barang = barang[3];
        var total = barang[3]*jumlah;

        total_pembelian += total;
        pembelian_total.innerHTML = "Rp "+total_pembelian;
        input_total.value = total_pembelian;

        var delButton = "tbody tr:first-child .del";

        var markup = 
            `<tr>
                <td>`+barang[1]+`</td>
                <td>`+barang[2]+`</td>
                <td>`+jumlah+`</td>
                <td>Rp `+barang[3]+`</td>
                <td>Rp `+total+`</td>
                <td>
                    <input type="hidden" id="pembelian_barang`+no+`" name="pembelian_barang[]" value="['`+id_barang+`', '`+jumlah+`', '`+total+`']">
                    <button type="button" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></button>
                </td>
            </tr>`;

        no+=1;

        table.find("tbody").prepend(markup);
        table.find(delButton).click(function() {
            total_pembelian -= total;
            input_total.value = total_pembelian;
            pembelian_total.innerHTML = "Rp "+total_pembelian;
            $(this).closest("tr").remove();
        });
    }

    // bayar, sisa, kembali
    var bayar = document.getElementById('bayar');
    var sisa = document.getElementById('sisa');
    var kembali = document.getElementById('kembali');

    bayar.onkeyup = function() {
        if(Math.sign(bayar.value - total_pembelian) == -1) {
            kembali.value = 0;
            sisa.value = bayar.value - total_pembelian;
        } else {
            sisa.value = 0;
            kembali.value = bayar.value - total_pembelian;
        }
        console.log(kembali.value)
    };

    // function batal
    function batal() {
        var bayar = document.getElementById('bayar').value = 0;
        var sisa = document.getElementById('sisa').value = 0;
        var kembali = document.getElementById('kembali').value = 0;
        var jumlah = document.getElementById('jumlah').value = 1;
        var catatan = document.getElementById('catatan').value = '';

        input_total.value = 0;
        pembelian_total.innerHTML = "Rp 0"

        var item = document.getElementById("tbody");
        item.parentNode.removeChild(item);
    }

    function proses() {
        var tr = document.getElementById("tbody").childElementCount;
        console.log(tr)
        if(tr > 0) {
            // console.log("sukses")
            $('#confirmAlert').modal('show');
        } else {
            // console.log("gagal")
            $('#nullAlert').modal('show');
        }
    }

    function formSubmit() {
        date = $('#date');
        pembeli = $('#pembeli_id');

        if(date.val() === '' | pembeli === '') {
            alert('Lengkapi dulu data pembeli dan tanggal pembelian');
        } else {
            $('#kasir-form').submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views/kasir/kasir.blade.php ENDPATH**/ ?>