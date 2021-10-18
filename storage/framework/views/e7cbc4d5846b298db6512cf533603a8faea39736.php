

<?php $__env->startSection('title'); ?>
Stok Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    <h1>Stok Barang<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    <p class="font-italic">data berikut diurutkan sesuai tanggal terbaru.</p>
    <!-- <form class="form-inline my-2 my-lg-3" action="/stok/stok_barang/cari" method="GET">
      <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Cari Nama Barang" aria-label="Search" value="<?php echo e(old('cari')); ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>  -->
    <div align="right">
        <a href="/stok/tambah" class="btn btn-success mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Barang</a>
        <a href="/stok/barang_keluar" class="btn btn-primary mb-3">Barang Keluar</a>
    </div>

    <table id="table" class="table table-hover">
        <div id="outside" class="mb-3"></div>
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang(kg)</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($stok->tanggal); ?></td>
                    <td><?php echo e($stok->nama_barang); ?></td>
                    <td><?php echo e($stok->jumlah_barang); ?></td>
                    <td><?php echo e($stok->kode_barang); ?></td>
                    
                <td>
                    <a href="/stok/<?php echo e($stok->id); ?>/show" class="btn btn-info btn-sm">Lengkap</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            buttons: [
                    
                {
                    extend:    'copy',
                    text:      '<i class="fa fa-copy"></i>',
                    titleAttr: 'Copy',
                    className: 'btn btn-md btn-copy'
                },
                {
                    extend:    'excel',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    className: 'btn btn-md btn-excel'
                },
                {
                    extend:    'pdf',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF',
                    className: 'btn btn-md btn-pdf'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    className: 'btn btn-md btn-print'
                },
                {
                    extend:    'colvis',
                    text:      '<i class="fa fa-eye"></i>',
                    titleAttr: 'Visibility',
                    className: 'btn btn-md  btn-colvis'
                },

            ],

            lengthChange: true,
            searching: true

        })
        .buttons()
        .container()
        .appendTo("#outside");
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views//stok/stok_barang.blade.php ENDPATH**/ ?>