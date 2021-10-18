

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
                        <input type="text" class="form-control" placeholder="Asal Barang" name="asal_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Jumlah Barang(kg) :</p>
                        <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah_barang">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Harga Beli(kg) :</p>
                        <input type="text" class="form-control" placeholder="Harga Beli" name="harga_beli">
                    </div>

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Harga Jual(kg) :</p>
                        <input type="text" class="form-control" placeholder="Harga Jual" name="harga_jual">
                    </div> 
                    
                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Kode Barang : <br><span class="text-secondary">otomatis ?</span> <input id="kode-check" type="checkbox" onclick="kodeCheck()" checked></p>
                        
                        <input type="text" class="form-control" placeholder="Kode Barang" id="kode-barang" disabled>
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

<?php $__env->startSection('js'); ?>
<script>
function kodeCheck() {
    var checkbox = document.getElementById("kode-check");
    var kodeBarang = document.getElementById("kode-barang");

    if(checkbox.checked == true) {
        kodeBarang.removeAttribute("name");
        kodeBarang.setAttribute("disabled", "");
    } else {
        kodeBarang.setAttribute("name", "kode_barang");
        kodeBarang.removeAttribute("disabled");
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views//stok/tambah.blade.php ENDPATH**/ ?>