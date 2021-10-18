

<?php $__env->startSection('title'); ?>
Detail Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <h1 class="text-center my-5">
            <?php echo e($stok->nama_barang); ?>

        </h1>
        
        <br/>
		<a href="" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Asal Barang</th>
                <th scope="col">Jumlah Barang(kg)</th>
                <th scope="col">Harga Beli(kg)</th>
                <th scope="col">Harga Jual(kg)</th>
                <th scope="col">Kode Barang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo e($stok->tanggal); ?></td>
                <td><?php echo e($stok->asal_barang); ?></td>
                <td><?php echo e($stok->jumlah_barang); ?></td>
                <td>Rp. <?php echo number_format($stok->harga_beli,0,',','.'); ?></td>
                <td>Rp. <?php echo number_format($stok->harga_jual,0,',','.'); ?></td>
                <td><?php echo e($stok->kode_barang); ?></td>
                </tr>
            </tbody>
        </table>
        <div>
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

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views/stok/detail_barang.blade.php ENDPATH**/ ?>