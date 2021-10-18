

<?php $__env->startSection('title'); ?>
Stok Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<script src="https://code.highcharts.com/highcharts.src.js"></script>
<h1>Modal Perusahaan</h1>

<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahDiagram">Tambah Modal</button>



<!-- Modal -->
<div class="modal fade" id="tambahDiagram" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Modal Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/modal/tambah">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Bulan</label>
                <select name="id_bulan" class="form-control" id="exampleFormControlSelect1">
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Pilih Bulan Untuk Penambahan Modal</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Modal</label>
                <input name="modal" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Modal">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<a href="javascript:history.back()" class="btn btn-secondary mb-3">Kembali</a>

<?php if(session('sukses')): ?>
<div class="alert alert-success" role="alert">
  <?php echo e(session('sukses')); ?>

</div>
<?php endif; ?>

<div class="panel">
    <div id="grafik">
    </div>
</div>

<script>
Highcharts.chart('grafik', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Modal Perusahaan'
    },
    subtitle: {
        text: 'UD WANGI AGUNG'
    },
    xAxis: {
        categories: <?php echo json_encode($categories); ?>,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rupiah x1000'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Modal',
        data: <?php echo json_encode($data); ?>


    }]
});
</script>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-danger mr-5" data-toggle="modal" data-target="#hapusdiagram">Bersihkan Diagram</button>
  <form id="form-hapus-modal" action="/modal/hapus/bulan" method="POST">
  <?php echo csrf_field(); ?>
    <select name="id_bulan" id="" type="button" class="btn btn-secondary" required>
      <option selected disabled>Pilih Bulan</option>
      <option value="1">Januari</option>
      <option value="2">Februari</option>
      <option value="3">Maret</option>
      <option value="4">April</option>
      <option value="5">Mei</option>
      <option value="6">Juni</option>
      <option value="7">Juli</option>
      <option value="8">Agustus</option>
      <option value="9">September</option>
      <option value="10">Oktober</option>
      <option value="11">November</option>
      <option value="12">Desember</option>
    </select>
  </form>
  <button type="button" class="btn btn-danger" onclick="$('#hapusbulan').modal('show')">Hapus</button>
</div>

<div class="modal fade" id="hapusdiagram" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bersihkan Seluruh Diagram?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <a href="/modal/hapus" class="btn btn-danger">Bersihkan</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapusbulan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Yakin hapus modal?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="$('#form-hapus-modal').submit()">Hapus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/ud_wangiagung/resources/views//keuangan/grafik.blade.php ENDPATH**/ ?>