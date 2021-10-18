

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

.range {
    max-width: 300px;
}
</style>
</head>

<body>
    <h1>Data Transaksi Barang<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    
    <button class="btn btn-primary mt-3 mb-3" onclick="" data-toggle="modal" data-target="#tambahModal">Tambah Stok</button>
    <a class="btn btn-info mt-3 mb-3" href="<?php echo e(route('chartStok')); ?>">Chart Stok</a>
    
    <P class="font-weight-bold"> Total Barang : <?php echo e($count); ?> </P>
    <p class="font-weight-bold" id="jumlah_keseluruhan"> Jumlah Keseluruhan Barang :  <?php echo e(number_format($total,0,',','.')); ?> Kg</p>

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
                <form action="<?php echo e(route('tambahStok')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <select id="pembeli_id" class="js-example-basic-single form-control" name="stok_id" required>
                            <option selected disabled>Pilih Barang</option>
                                <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($b->id); ?>"><?php echo e($b->kode_barang); ?> - <?php echo e($b->nama_barang); ?> - <?php echo e($b->jumlah_barang); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                
                    <div class="mt-3">
                        <?php echo csrf_field(); ?>
                        <input id="tambahStok" name="jumlah" type="number" class="form-control" placeholder="Jumlah Stok" required> 
                    </div>      

                    <div class="mt-3">
                        <p class="font-weight-bold">Tanggal Masuk:</p>
                            <input class="date form-control" type="date" class="form-control" placeholder="Tahun-Bulan-Tanggal" name="tanggal_masuk" required>
                    </div>

                    <div class="mt-3">
                        <p class="font-weight-bold">Tanggal Expired:</p>
                            <input class="date form-control" type="date" class="form-control" placeholder="Tahun-Bulan-Tanggal" name="tanggal_expired" required>
                    </div>
              
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
    <h2 class="mt-2">Barang Masuk</h2><hr>
    
    <table id="table" class="table table-hover">
        <div class="d-flex justify-content-between">
            <div id="outside" class="mb-3"></div>
            <div id="range" class="mb-3 form-inline">
                <div class="input-group range">
                    <input type="text" class="form-control" id="min" placeholder="Min">
                    <div class="input-group-prepend">
                        <div class="input-group-text">to</div>
                    </div>
                    <input type="text" class="form-control" id="max" placeholder="Max">
                </div>
            </div>
        </div>
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl.Masuk</th>
                <th scope="col">Tgl.Expired</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah(kg)</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $barang_masuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $weekago = date('Y-m-d', strtotime('-7 day', strtotime($bm->tanggal_expired)));
                    if($bm->tanggal_expired < Carbon\Carbon::now()) {
                        $color = 'bg-danger';
                    } elseif(Carbon\Carbon::now() > $weekago) {
                        $color = 'bg-warning';
                    } else {
                        $color = '';
                    }
                    $stok = \App\stok_barang::find($bm->stok_id);
                ?>
                <tr class=<?php echo e($color); ?>>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($bm->tanggal_masuk); ?></td>
                    <td>
                        <?php echo e($bm->tanggal_expired); ?>

                    </td>
                    <td><?php echo e($stok->nama_barang); ?></td>
                    <td><?php echo e($bm->jumlah); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
    <!-- Barang Keluar -->
    <div class="column">
    <h2 class="mt-2" >Barang Keluar</h2><hr>

    <table id="table1" class="table table-hover">
        <div class="d-flex justify-content-between">
            <div id="outside1" class="mb-3"></div>
            <div id="range" class="mb-3 form-inline">
                <div class="input-group range">
                    <input type="text" class="form-control" id="min1" placeholder="Min">
                    <div class="input-group-prepend">
                        <div class="input-group-text">to</div>
                    </div>
                    <input type="text" class="form-control" id="max1" placeholder="Max">
                </div>
            </div>
        </div>
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
    var minDate, maxDate;

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            if ( settings.nTable.id !== 'table' ) {
                return true;
            }
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[1] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date && max === null ) ||
                ( min <= date && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        minDate = new DateTime($('#min'), {
            format: 'DD-MM-YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'DD-MM-YYYY'
        });

        $('#table').DataTable({
            buttons: [
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    title:     'Barang Masuk',
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

        $('#min, #max').on('change', function () {
            $('#table').DataTable().draw();
        });
    });
</script>

<script>
    var minDate1, maxDate1;

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            if ( settings.nTable.id !== 'table1' ) {
                return true;
            }

            var min1 = minDate1.val();
            var max1 = maxDate1.val();
            var date1 = new Date( data[1] );
    
            if (
                ( min1 === null && max1 === null ) ||
                ( min1 === null && date1 <= max1 ) ||
                ( min1 <= date1 && max1 === null ) ||
                ( min1 <= date1 && date1 <= max1 )
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        minDate1 = new DateTime($('#min1'), {
            format: 'DD-MM-YYYY'
        });
        maxDate1 = new DateTime($('#max1'), {
            format: 'DD-MM-YYYY'
        });

        $('#table1').DataTable({
            buttons: [
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    title:    'Barang Keluar',
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

        $('#min1, #max1').on('change', function () {
            $('#table1').DataTable().draw();
        });
    });
</script>

<script>


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/stok_udwangiagung_fix/resources/views//dashboard/dashboard.blade.php ENDPATH**/ ?>