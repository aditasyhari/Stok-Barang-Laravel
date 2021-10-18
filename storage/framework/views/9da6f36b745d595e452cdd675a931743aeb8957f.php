

<?php $__env->startSection('title'); ?>
Data Pembeli
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body>
    <h1>Data Pembeli<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    <form class="form-inline my-2 my-lg-3" action="/stok_barang/cari" method="GET">
      <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Cari Nama Pembeli" aria-label="Search" value="<?php echo e(old('cari')); ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> 
    <div align="right">
    <a href="/keuangan/tambahpembeli" class="btn btn-link mb-3"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Pembeli</a>
    <a href="/keuangan/grafik" class="btn btn-success mb-3">Modal</a>
    </div>
    

    

    <table class="table table-hover" align="center">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $data_pembelis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembeli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="row"><?php echo e($loop->iteration); ?></th>
            <td><?php echo e($pembeli->nama_pembeli); ?></td>
            <td><?php echo e($pembeli->alamat_pembeli); ?></td>
            <td><?php echo e($pembeli->nomor_hp); ?></td>
            <td><?php echo e($pembeli->email_pembeli); ?></td>
        <td>
        <a href="/keuangan/<?php echo e($pembeli->id); ?>/riwayat" class="btn btn-success btn-sm">Riwayat</a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </tbody>
    </table>
    <P class="font-weight-bold">
    Halaman :  <?php echo e($data_pembelis->currentPage()); ?><br/>
    Jumlah Seluruh Pembeli :  <?php echo e($data_pembelis->total()); ?><br/>
    </P>
    <?php echo e($data_pembelis->links()); ?>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views//keuangan/data_pembeli.blade.php ENDPATH**/ ?>