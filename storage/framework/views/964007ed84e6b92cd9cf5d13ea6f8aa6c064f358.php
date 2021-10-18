

<?php $__env->startSection('title'); ?>
Stok Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<script src="https://code.highcharts.com/highcharts.src.js"></script>
<h1>Grafik Barang Keluar</h1>
<a href="javascript:history.back()" class="btn btn-secondary mb-3">Kembali</a>

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
        text: 'Barang yang diminati'
    },
    subtitle: {
        text: 'UD WANGI AGUNG'
    },
    xAxis: {
      type: 'category',
      labels: {
          rotation: -45,
          style: {
              fontSize: '13px',
              fontFamily: 'Verdana, sans-serif'
          }
      }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Barang Keluar'
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
        name: 'Jumlah',
        data: <?php echo json_encode($data); ?>


    }],
    dataLabels: {
        enabled: true,
        rotation: -90,
        color: '#FFFFFF',
        align: 'right',
        format: '{point.y:.1f}', // one decimal
        y: 10, // 10 pixels down from the top
        style: {
            fontSize: '13px',
            fontFamily: 'Verdana, sans-serif'
        }
    }
});
</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok_barang_laravel-main\resources\views/dashboard/stok-chart.blade.php ENDPATH**/ ?>