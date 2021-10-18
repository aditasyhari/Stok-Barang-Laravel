

<?php $__env->startSection('title'); ?>
Stok Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    <h1>Stok Barang</h1>
    <form class="form-inline my-2 my-lg-3" action="/stok_barang/cari" method="GET">
      <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Cari Nama Barang" aria-label="Search" value="<?php echo e(old('cari')); ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> 
    <a href="/tambah" class="btn btn-success mb-3">Tambah Barang</a>
    <button type="button" class="btn btn-primary mb-3">Barang Keluar</button>
    <button type="button" class="btn btn-link mb-3">Cetak Laporan</button>
    

    

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Asal Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang(kg)</th>
                <th scope="col">Harga Beli(kg)</th>
                <th scope="col"></th>
            </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="row"><?php echo e($loop->iteration); ?></th>
            <td><?php echo e($stok->tanggal); ?></td>
            <td><?php echo e($stok->asal_barang); ?></td>
            <td><?php echo e($stok->nama_barang); ?></td>
            <td><?php echo e($stok->jumlah_barang); ?></td>
            <td><?php echo e($stok->harga_beli); ?></td>
        <td>
        <a href="" class="btn btn-info btn-sm">Rubah</a>
        <a href="" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </tbody>
    </table>
    <P class="font-weight-bold">
    Halaman :  <?php echo e($stok_barangs->currentPage()); ?><br/>
    Jumlah Seluruh Barang :  <?php echo e($stok_barangs->total()); ?><br/>
    </P>
    <?php echo e($stok_barangs->links()); ?>

</body>
<?php $__env->stopSection(); ?>   
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ud_wangiagung\resources\views/stok_barang.blade.php ENDPATH**/ ?>