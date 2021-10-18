

<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
<h4>Pilih Kolom Filter</h4>
<select style="width: 200px;" class="js-example-basic-single form-control mb-3" id="pilihfilter">
  <option value="Jumlah Barang">Jumlah Barang</option>
  <option value="Stok Barang">Stok Barang</option>
  <option value="Barang Masuk">Barang Masuk</option>
  <option value="Total Keluar">Barang Keluar</option>
  <option value="Barang Diminati">Barang yang Diminati</option>
  <option value="Semua">Semua</option>
</select> 
  <div id="range" class="mb-3 form-inline">
      <div class="input-group range">
          <input type="text" style="height: 45px;" class="form-control" id="mindate" placeholder="Min">
          <div class="input-group-prepend">
              <div class="input-group-text">to</div>
          </div>
          <input type="text" style="height: 45px;" class="form-control" id="maxdate" placeholder="Max">
      </div>
      <button id="filterdata" class="btn btn-primary ml-2">Filter</button>

  </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-app text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jumlah Barang</p>
                      <p class="card-title jumlahbarang"><?php echo e($count); ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-refresh"></i> -->
                  Jumlah Seluruh Barang
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-box-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Stok Barang</p>
                      <p class="card-title stokbarang"><?php echo e(number_format($total,0,',','.')); ?> Kg<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-calendar-o"></i> -->
                  Jumlah Stok di Gudang
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-cloud-download-93 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Barang Masuk</p>
                      <p class="card-title barangmasuk"><?php echo e($barang_masuk); ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-clock-o"></i> -->
                  Total Barang Masuk
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-cloud-upload-94 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Barang Keluar</p>
                      <p class="card-title barangkeluar"><?php echo e($total_keluar); ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-refresh"></i> -->
                  Total Barang Keluar
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Grafik -->
        <div class="row">
          <div class="col-md-12 mt-5">
            <div class="card ">
              <div class="card-header ">
              </div>
              <div class="card-body ">
                <div id="grafik"></div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> Opened
                  <i class="fa fa-circle text-warning"></i> Read
                  <i class="fa fa-circle text-danger"></i> Deleted
                  <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Number of emails sent
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">NASDAQ: AAPL</h5>
                <p class="card-category">Line Chart with Points</p>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i> Tesla Model S
                  <i class="fa fa-circle text-warning"></i> BMW 5 Series
                </div>
                <hr />
                <div class="card-stats">
                  <i class="fa fa-check"></i> Data information certified
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

$("#filterdata").click(()=>{
  var tglawal = $("#mindate").val()
  var tglakhir = $("#maxdate").val()
  var pilihfilter = $("#pilihfilter").val()
  axios.post("<?php echo e(url('filterdata')); ?>",{pilihfilter, tglawal,tglakhir})
  .then((res)=>{
    chartdata.series[0].update({
      data: res.data.datatable
}, true);

    $(".jumlahbarang").html(res.data.count)
    $(".stokbarang").html(res.data.total)
    $(".barangmasuk").html(res.data.barang_masuk)
    $(".barangkeluar").html(res.data.total_keluar)
  })
})

$(document).ready(function() {
        minDate = new DateTime($('#mindate'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#maxdate'), {
            format: 'YYYY-MM-DD'
        });
})


var chartdata = Highcharts.chart('grafik', {
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok_barang_laravel-main\resources\views//dashboard/dashboard.blade.php ENDPATH**/ ?>