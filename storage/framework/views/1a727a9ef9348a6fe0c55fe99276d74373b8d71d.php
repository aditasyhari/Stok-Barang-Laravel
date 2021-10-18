

<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>

<body>
    <h1>Data Transaksi Barang<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    
    <button class="btn btn-primary mt-3 mb-3" onclick="" data-toggle="modal" data-target="#tambahModal">Tambah Stok</button>
    
    <P class="font-weight-bold"> Total Barang : <?php echo e($count); ?> </P>
    <p class="font-weight-bold" id="jumlah_keseluruhan"> Jumlah Keseluruhan Barang : </p>

    <!-- Modal Tambah Stok -->
    <div class="modal fade" id="tambahModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Stok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="" method="">
                    <?php echo csrf_field(); ?>
                    <select id="pembeli_id" class="js-example-basic-single form-control" name="pembeli_id" required>
                            <option selected disabled>Pilih Barang</option>
                                <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=""><?php echo e($b->kode_barang); ?> - <?php echo e($b->nama_barang); ?> - <?php echo e($b->jumlah_barang); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                
                <div class="mt-3">
                <form action="" method="">
                    <?php echo csrf_field(); ?>
                    <input id="tambahStok" name="tambahStok" type="number" class="form-control" placeholder="Jumlah Stok" required> 
                    <input type="hidden" name="id" id="id_stok">  
                </div>      

                <div class="mt-3">
                    <p class="font-weight-bold">Tanggal :</p>
                         <input class="date form-control" type="date" class="form-control" placeholder="Tahun-Bulan-Tanggal" name="tanggal">
                </div>
                    <script type="text/javascript">
                    $('.date').datepicker({  
                    format: 'yyyy-mm-dd'
                    });  
                    </script>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
<div class="row">
    <!-- Barang Masuk -->
    <div class="column">
    <h2 class="mt-2">Barang Masuk</h2>
    
    <table id="table" class="table table-hover">
        <div id="outside" class="mb-3"></div>
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang(kg)</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
            </tr>
            

        </tbody>
    </table>
    </div>
    <!-- Barang Keluar -->
    <div class="column">
    <h2 class="mt-2" >Barang Keluar <span color="red"><i class="fas fa-caret-square-up"></span></i></h2>

    <table id="table1" class="table table-hover">
        <div id="outside1" class="mb-3"></div>
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Pembeli</th>
                <th scope="col">Barang</th>
                <th scope="col">Jumlah(kg)</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <?php
                    $r = \App\Riwayat::find($p->riwayat_id);
                    $u = \App\data_pembeli::find($r->pembeli_id);
                ?>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($r->tanggal_pembelian); ?></td>
                <td><?php echo e($u->nama_pembeli); ?></td>
                <td><?php echo e($p->nama_barang); ?></td>
                <td><?php echo e($p->jumlah); ?></td>
                <td>Rp <?php echo e(number_format($p->total, 0, ",", ".")); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
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
        $('#table').DataTable({
            buttons: [

                // {
                //     extend:    'pdf',
                //     text:      '<i class="fa fa-file-pdf-o"></i>',
                //     titleAttr: 'PDF',
                //     className: 'btn btn-md btn-pdf'
                // },
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

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            buttons: [
                    
                // {
                //     extend:    'pdf',
                //     text:      '<i class="fa fa-file-pdf-o"></i>',
                //     titleAttr: 'PDF',
                //     className: 'btn btn-md btn-pdf'
                // },
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
        .appendTo("#outside1");
    });
</script>

<script>

    var table = document.getElementById("jumlah_keseluruhan"), sumHsl =0;
    for(var t = 1; t < table.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML);
    }
    document.getElementById("jumlah_keseluruhan").innerHTML = "Jumlah Keseluruhan Barang =" + sumHsl;

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok_udwangiagung_fix\resources\views//dashboard/dashboard.blade.php ENDPATH**/ ?>