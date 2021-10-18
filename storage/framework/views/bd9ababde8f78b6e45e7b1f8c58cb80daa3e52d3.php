

<?php $__env->startSection('title'); ?>
Buat Barang Baru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1 class="text-center my-2 my-lg-3">Tambah Barang</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Tambahkan Barang Baru</div>

            <div class="card-body">
            <form action="\simpan-barang">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Nama Barang :</p>
                        <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Asal Barang :</p>
                        <input type="text" class="form-control" placeholder="Jenis Barang" name="asal_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Jumlah Barang(kg) :</p>
                        <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Harga Beli(kg) :</p>
                        <input type="text" class="form-control" placeholder="Harga Barang" name="harga_beli">
                    </div>
                    
                    <div>
                    <p class="font-weight-bold">Masukkan Tanggal :</p>
                         <input class="date form-control" type="text" class="form-control" placeholder="Tahun-Bulan-Tanggal" name="tanggal">
                    </div>
                    <script type="text/javascript">
                    $('.date').datepicker({  
                    format: 'yyyy-mm-dd'
                    });  
                    </script>  

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-5"> Simpan </button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views/tambah.blade.php ENDPATH**/ ?>