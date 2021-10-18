

<?php $__env->startSection('title'); ?>
Detail Pembeli
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <h1 class="text-center my-5">
            <?php echo e($pembeli->nama_pembeli); ?>

        </h1>
        
        <br/>
		<table class='table table-bordered'>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo e($pembeli->alamat_pembeli); ?></td>
                <td><?php echo e($pembeli->nomor_hp); ?></td>
                <td><?php echo e($pembeli->email_pembeli); ?></td>
                </tr>
            </tbody>
        </table>
        <div>
        <a href="/keuangan/<?php echo e($pembeli->id); ?>/ubah" class="btn btn-primary">Ubah</a>
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
                        <a href="/keuangan/<?php echo e($pembeli->id); ?>/delete" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                    </div>
                </div>
                </div>
        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views/keuangan/detail_pembeli.blade.php ENDPATH**/ ?>