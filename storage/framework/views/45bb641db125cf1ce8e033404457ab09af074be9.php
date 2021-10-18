

<?php $__env->startSection('title'); ?>
Detail Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
.main-panel {
    min-height: 100vh; 
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">

    <h1 class="text-center my-5">
        <?php echo e($stok->nama_barang); ?>

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
            <td><?php echo e($stok->asal_barang); ?></td>
            <td><?php echo e($stok->jumlah_barang); ?></td>
            <td>Rp. <?php echo number_format($stok->harga_beli,0,',','.'); ?></td>
            <td>Rp. <?php echo number_format($stok->harga_jual,0,',','.'); ?></td>
            <td><?php echo e($stok->kode_barang); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="mb-3">
        <a href="/stok/<?php echo e($stok->id); ?>/ubah" class="btn btn-primary">Ubah</a>
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
                    <a href="/stok/<?php echo e($stok->id); ?>/delete" class="btn btn-danger">Hapus</a>
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

            ],

            lengthChange: false,
            searching: false

        })
        .buttons()
        .container()
        .appendTo("#outside");

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/stok_barang_laravel-main/resources/views/stok/detail_barang.blade.php ENDPATH**/ ?>