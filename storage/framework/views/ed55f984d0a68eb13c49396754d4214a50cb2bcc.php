

<?php $__env->startSection('title'); ?>
Ubah Data Pembeli
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1 class="text-center my-5">Ubah Data Pembeli</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Ubah Data Pembeli</div>

            <div class="card-body">

                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <div class="list-group">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <li class="list-group-item">
                            <?php echo e($error); ?>

                         </li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>

                <form action="/keuangan/<?php echo e($pembeli->id); ?>/update_pembeli">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                    <p class="font-weight-bold">Nama Pembeli :</p>
                        <input type="text" class="form-control" value="<?php echo e($pembeli->nama_pembeli); ?>" placeholder="Nama Pembeli" name="nama_pembeli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Alamat Pembeli :</p>
                        <input type="text" class="form-control" value="<?php echo e($pembeli->alamat_pembeli); ?>" placeholder="Alamat Pembeli" name="alamat_pembeli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Nomor HP :</p>
                        <input type="text" class="form-control" value="<?php echo e($pembeli->nomor_hp); ?>" placeholder="Nomor HP" name="nomor_hp">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Email Pembeli :</p>
                        <input type="text" class="form-control" value="<?php echo e($pembeli->email_pembeli); ?>" placeholder="Email Pembeli" name="email_pembeli">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-5"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views/keuangan/ubah_pembeli.blade.php ENDPATH**/ ?>