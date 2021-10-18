<!DOCTYPE html>
<html>
<head>
	<title>Stok Barang Keluar</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
	<div class="container">
		<div class="card mt-5">
			<div class="card-body">
				<h3 class="text-center">UD. Wangi Agung</a></h3>
                <h3 class="text-center"></a></h3>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Barang</th>
							<th>Tanggal</th>
							<th>Nama Pembeli</th>
						</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $riwayat_pembelian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
                            <?php echo e($riwayat->tanggal_pembelian); ?>

                            </td>
							<td>
							<?php $__currentLoopData = $riwayat->stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo e($stok->nama_barang); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</td>
							<td>
							
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
 
</body>
</html><?php /**PATH E:\ud_wangiagung\resources\views/barang_keluar.blade.php ENDPATH**/ ?>