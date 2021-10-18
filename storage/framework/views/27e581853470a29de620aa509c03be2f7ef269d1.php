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
		<h2>Laporan Barang</h2>
	</center>
      </div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
		  		<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Asal Barang</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
          </tr>
        </thead>
        <tbody>
		<?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($stok->kode_barang); ?></td>
				<td><?php echo e($stok->nama_barang); ?></td>
				<td><?php echo e($stok->asal_barang); ?></td>
				<td>Rp. <?php echo number_format($stok->harga_beli,0,',','.'); ?></td>
				<td>Rp. <?php echo number_format($stok->harga_jual,0,',','.'); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
      </table>

      <div id="notices">
        <div>Perhatian:</div>
        
        <div class="notice">Laporan ini melampirkan data barang.</div>
      </div>
    </main>
    <footer>
	  Laporan valid tanpa tanda tangan.
    </footer>
  </body>
</html><?php /**PATH /home/aditasyhari/Project Laravel/stok_barang_laravel-main/resources/views/laporan/stok_pdf.blade.php ENDPATH**/ ?>