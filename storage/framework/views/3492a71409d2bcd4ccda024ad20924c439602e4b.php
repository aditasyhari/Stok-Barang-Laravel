

<?php $__env->startSection('title'); ?>
Nama Barang : <?php echo e($stok_barang->nama_barang); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <h1 class="text-center my-5">
            <?php echo e($stok_barang->nama_barang); ?>

        </h1>
        
        <br/>
		<a href="" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">Asal Barang</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo e($stok_barang->asal_barang); ?></td>
                <td>Rp. <?php echo number_format($stok_barang->harga_beli,0,',','.'); ?></td>
                <td><?php echo e($stok_barang->jumlah_barang); ?></td>
                <td><?php echo e($stok_barang->tanggal); ?></td>
                </tr>
            </tbody>
        </table>
        <div>
        <a href="" class="btn btn-primary">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views/stok/detail.blade.php ENDPATH**/ ?>