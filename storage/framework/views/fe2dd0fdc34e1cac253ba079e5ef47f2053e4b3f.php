

<?php $__env->startSection('title'); ?>
Tambah Pembeli Baru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1 class="text-center my-2 my-lg-3">Tambah Pembeli</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Tambahkan Pembeli Baru</div>

            <div class="card-body">
            <form action="\simpan-pembeli">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Nama Pembeli :</p>
                        <input type="text" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Alamat Pembeli :</p>
                        <input type="text" class="form-control" placeholder="Alamat Pembeli" name="alamat_pembeli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Nomor HP :</p>
                        <input type="text" class="form-control" placeholder="Nomor HP" name="nomor_hp">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Email :</p>
                        <input type="text" class="form-control" placeholder="Email Pembeli" name="email_pembeli">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-5"> Simpan </button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views//keuangan/tambahpembeli.blade.php ENDPATH**/ ?>