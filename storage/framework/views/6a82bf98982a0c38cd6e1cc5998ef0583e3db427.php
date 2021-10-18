

<?php $__env->startSection('title'); ?>
Data Pembeli
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <h1 class="text-center mt-2">
            <?php echo e($pembeli->nama_pembeli); ?>

        </h1>
        <p class="font-weight-bold">Alamat : <?php echo e($pembeli->alamat_pembeli); ?></p>
        <p class="font-weight-bold">Nomor HP : <?php echo e($pembeli->nomor_hp); ?></p>
        <p class="font-weight-bold">Email : <?php echo e($pembeli->email_pembeli); ?></p>

        <br/>

        <table id="table" class="table table-hover">
            <div class="mb-3" id="outside"></div>
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Dibayar</th>
                    <th scope="col">Hutang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pembeli->riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($r->tanggal_pembelian); ?></td>
                    <td>Rp <?php echo e(number_format($r->total_pembelian, 0, ",", ".")); ?></td>
                    <td>Rp <?php echo e(number_format($r->dibayar, 0, ",", ".")); ?></td>
                    <td>Rp <?php echo e(number_format($r->hutang, 0, ",", ".")); ?></td>
                    <td>
                        <a href="<?php echo e(route('detailRiwayat', ['pembeli'=>$pembeli->id, 'riwayat'=>$r->id])); ?>" class="btn btn-secondary">Detail</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div>
        <!-- <a href="" class="btn btn-success" target="_blank">Cetak Semua Riwayat</a> -->

        <a href="/keuangan/<?php echo e($pembeli->id); ?>/ubah" class="btn btn-primary">Ubah</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusdiagram">Hapus</button>

        <div class="modal fade" id="hapusdiagram" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus <?php echo e($pembeli->nama_pembeli); ?>?</h5>
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
        </div>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views/keuangan/riwayat.blade.php ENDPATH**/ ?>