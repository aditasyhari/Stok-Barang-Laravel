<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Laporan Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<style>
		@font-face {
		font-family: SourceSansPro;
		src: url(SourceSansPro-Regular.ttf);
		}

		.clearfix:after {
		content: "";
		display: table;
		clear: both;
		}

		a {
		color: #0087C3;
		text-decoration: none;
		}

		body {
		position: relative;
		width: 18cm;  
		height: 29.7cm; 
		margin: 0 auto; 
		color: #555555;
		background: #FFFFFF; 
		font-family: Arial, sans-serif; 
		font-size: 14px; 
		font-family: SourceSansPro;
		}

		header {
		padding: 10px 0;
		margin-bottom: 20px;
		border-bottom: 1px solid #AAAAAA;
		}

		#logo {
		float: left;
		margin-top: 8px;
		}

		#logo img {
		height: 80px;
        width: 200px;
		}

		#company {
		float: center;
		text-align: center;
		}


		#details {
		margin-bottom: 50px;
		}


		h2.name {
		font-size: 1.4em;
		font-weight: normal;
		margin: 0;
		}


		table {
		width: 100%;
		border-collapse: collapse;
		border-spacing: 0;
		margin-bottom: 20px;
		}

		table th,
		table td {
		padding: 10px;
		background: #EEEEEE;
		text-align: center;
		border-bottom: 1px solid #FFFFFF;
		}


		#notices{
		padding-left: 6px;
		border-left: 6px solid #0087C3;  
		}

		#notices .notice {
		font-size: 1.2em;
		}

		footer {
		color: #777777;
		width: 100%;
		height: 30px;
		position: absolute;
		bottom: 0;
		border-top: 1px solid #AAAAAA;
		padding: 8px 0;
		text-align: center;
		}


	</style>
  </head>
  <body>
    <header class="clearfix">
      <!-- <div id="logo">
	  <img src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80">
      </div> -->
      <div id="company">
        <h2 class="name">UD.WANGI AGUNG</h2>
        <div>Jl. Cokroningrat</div>
		<div>Kel. Sumberrejo Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68432</div>
        <div>+6281249252832</div>
      </div>
      </div>
    </header>
    <main>
		<div id="details" class="clearfix">
		<center>
		<h2>Laporan Stok Barang</h2>
	</center>
      </div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
		  		<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Masuk</th>
                <th>Keluar</th>
                <th>Jumlah</th>
                <th>Harga Stok (Rp)</th>
          </tr>
        </thead>
        <tbody>
		<?php echo e($total_harga_stok = 0); ?>

		<?php echo e($total_jumlah = 0); ?>

		<?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
				$masuk = \App\BarangMasuk::where('stok_id', $stok->id)->sum('jumlah');
				$keluar = \App\Pembelian::where('kode_barang', $stok->kode_barang)->sum('jumlah');
				$harga_stok = $stok->harga_jual * $stok->jumlah_barang;
				$total_jumlah += $stok->jumlah_barang;
				$total_harga_stok += $harga_stok;
			?>
			<tr>
				<td><?php echo e($stok->kode_barang); ?></td>
				<td><?php echo e($stok->nama_barang); ?></td>
				<td><?php echo e($stok->harga_jual); ?></td>
				<td><?php echo e($masuk); ?></td>
				<td><?php echo e($keluar); ?></td>
                <td><?php echo e($stok->jumlah_barang); ?></td>
                <td><?php echo e(number_format($harga_stok,0,',','.')); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td colspan="5">Total :</td>
			<td><?php echo e(number_format($total_jumlah,0,',','.')); ?></td>
			<td><?php echo e(number_format($total_harga_stok,0,',','.')); ?></td>
		</tr>
        </tbody>
        
      </table>
		<h3><b><span id="total"></span></b></h3>
      <div id="notices">
        <div>Perhatian:</div>
        <div class="notice">Laporan ini melampirkan semua stok barang.</div>
      </div>
    </main>
    <footer>
	  Laporan valid tanpa tanda tangan.
    </footer>
  </body>
</html>

<?php $__env->startSection('js'); ?>

<script>
		var total = 0;
		var table = document.getElementById("total");
		for(var t = 1; t < table.rows.length; t++)
		{
			total = total + parseInt(table.rows[t].cells[5].innerHTML);
		}
		document.getElementById("total").innerHTML = "Jumlah Stok = "+ total;

</script>

<?php $__env->stopSection(); ?><?php /**PATH /home/aditasyhari/Project Laravel/stok_udwangiagung_fix/resources/views/laporan/total_pdf.blade.php ENDPATH**/ ?>