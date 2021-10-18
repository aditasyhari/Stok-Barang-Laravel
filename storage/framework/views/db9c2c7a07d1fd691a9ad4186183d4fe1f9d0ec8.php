

<?php $__env->startSection('title'); ?>
Stok Barang - Barang Keluar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
        <?php $__currentLoopData = $pembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php
                $r = \App\Riwayat::find($p->riwayat_id);
                $s = \App\stok_barang::find($p->stok_barang_id);
                $u = \App\data_pembeli::find($r->pembeli_id);
            ?>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($r->tanggal_pembelian); ?></td>
            <td><?php echo e($u->nama_pembeli); ?></td>
            <td><?php echo e($s->nama_barang); ?></td>
            <td><?php echo e($p->jumlah); ?></td>
            <td>Rp <?php echo e(number_format($p->total, 0, ",", ".")); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views//stok/barang_keluar.blade.php ENDPATH**/ ?>