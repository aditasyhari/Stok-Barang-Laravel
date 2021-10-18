

<?php $__env->startSection('title'); ?>
Data Pembeli
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <h1 class="text-center mt-2">
            NAMA PEMBELI
        </h1>
        <p class="font-italic">Asal</p>
        <p class="font-italic">Email</p>
        <p class="font-italic">Nomor HP</p>

        <br/>
		<table class='table table-bordered'>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
                <th scope="col">Dibayar</th>
                <th scope="col">Sisa</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                <a href="" class="btn btn-primary">Update</a>
                <a href="" class="btn btn-success">Cetak</a>
                </td>
                </tr>
            </tbody>
        </table>
        <div>
        <a href="" class="btn btn-primary" target="_blank">Cetak Semua Riwayat</a>

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

        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views//keuangan/riwayat.blade.php ENDPATH**/ ?>