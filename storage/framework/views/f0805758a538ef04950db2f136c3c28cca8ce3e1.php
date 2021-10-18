

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

                    <div class="form-group">
                    <p class="font-weight-bold">Masukkan Kode Pembeli : <br><span class="text-secondary">otomatis ?</span> <input id="kode-check" type="checkbox" onclick="kodeCheck()" checked></p>
                        
                        <input type="text" class="form-control" placeholder="Kode Pembeli" id="kode-pembeli" disabled>
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

<?php $__env->startSection('js'); ?>
<script>
function kodeCheck() {
    var checkbox = document.getElementById("kode-check");
    var kodePembeli = document.getElementById("kode-pembeli");

    if(checkbox.checked == true) {
        kodePembeli.removeAttribute("name");
        kodePembeli.setAttribute("disabled", "");
    } else {
        kodePembeli.setAttribute("name", "kode_pembeli");
        kodePembeli.removeAttribute("disabled");
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok_udwangiagung_fix\resources\views//keuangan/tambahpembeli.blade.php ENDPATH**/ ?>