

<?php $__env->startSection('title'); ?>
Ubah Data Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1 class="text-center my-5">Ubah Data Barang</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Ubah Data Barang</div>

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

                <form action="/stok/<?php echo e($stok->id); ?>/update_barang">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                    <p class="font-weight-bold">Nama Barang :</p>
                        <input type="text" class="form-control" value="<?php echo e($stok->nama_barang); ?>" placeholder="Nama Barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Asal Barang :</p>
                        <input type="text" class="form-control" value="<?php echo e($stok->asal_barang); ?>" placeholder="Asal Barang" name="asal_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Jumlah Barang :</p>
                        <input type="text" class="form-control" value="<?php echo e($stok->jumlah_barang); ?>" placeholder="Jumlah Barang" name="jumlah_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Harga_beli :</p>
                        <input type="text" class="form-control" value="<?php echo e($stok->harga_beli); ?>" placeholder="Harga Beli" name="harga_beli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Harga_jual :</p>
                        <input type="text" class="form-control" value="<?php echo e($stok->harga_jual); ?>" placeholder="Keterangan" name="harga_jual">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Kode Barang :</p>
                        <input type="text" class="form-control" value="<?php echo e($stok->kode_barang); ?>" placeholder="Kode Barang" name="kode_barang">
                    </div>

                    <div>
                    <p class="font-weight-bold">Tanggal :</p>
                         <input class="date form-control" type="text" value="<?php echo e($stok->tanggal); ?>" class="form-control" placeholder="Tanggal" name="tanggal">
                    </div>
                    <script type="text/javascript">
                    $('.date').datepicker({  
                    format: 'yyyy-mm-dd'
                    });  
                    </script>
  

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views/stok/ubah_barang.blade.php ENDPATH**/ ?>