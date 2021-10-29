@extends('template.app')

@section('title')
Dashboard
@endsection

@section('css')
@endsection

@section('content')

    <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card ">
        <div class="card-people mt-auto">
          <img src="{{ asset('template/images/dashboard/inventory.png') }}">
          <!-- <div class="weather-info">
            <div class="d-flex">
              <div>
                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
              </div>
              <div class="ml-2">
                <h4 class="location font-weight-normal">Bangalore</h4>
                <h6 class="font-weight-normal">India</h6>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Jumlah Barang</p>
              <p class="fs-30 mb-2 jumlahbarang">{{$count}}</p>
              <p>Jumlah Seluruh Barang</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Stok Barang</p>
              <p class="fs-30 mb-2 stokbarang">{{ number_format($total,0,',','.') }} Kg</p>
              <p>Jumlah Stok di Gudang</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Barang Masuk</p>
              <p class="fs-30 mb-2 barangmasuk">{{$barang_masuk}}</p>
              <p>Total Barang Masuk</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Barang Keluar</p>
              <p class="fs-30 mb-2 barangkeluar">{{$total_keluar}}</p>
              <p>Total Barang Keluar</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
          <input type="date" style="height: 45px;" class="form-control" id="mindate" placeholder="Min">
          <div class="input-group-prepend">
              <div class="input-group-text">to</div>
          </div>
          <input type="date" style="height: 45px;" class="form-control" id="maxdate" placeholder="Max">
      </div>
      <button id="filterdata" class="btn btn-primary ml-2">Filter</button>

  </div>

  <!-- Grafik -->
  <div class="row">
    <div class="col-md-12 ">
      <div class="card ">
        <div class="card-header ">
        </div>
        <div class="card-body ">
          <div id="grafik"></div>
        </div>
      </div>
    </div>
  </div>


  <h4 class="mt-5">Filter Barang Keluar</h4>
  <select style="width: 200px;" class="js-example-basic-single form-control mb-3" id="filter_bk">
    <option selected disabled>Pilih Barang</option>
    @foreach($stok_barangs as $stok)
      <option value="{{ $stok->kode_barang }}">{{ $stok->nama_barang }}</option>
    @endforeach
  </select> 
  <div id="range" class="mb-3 form-inline">
      <div class="input-group range">
          <input type="date" style="height: 45px;" class="form-control" id="mindate2" placeholder="Min">
          <div class="input-group-prepend">
              <div class="input-group-text">to</div>
          </div>
          <input type="date" style="height: 45px;" class="form-control" id="maxdate2" placeholder="Max">
      </div>
      <button id="filterdata_bk" class="btn btn-primary ml-2">Filter</button>

  </div>

  <!-- Grafik -->
  <div class="row">
    <div class="col-md-12 ">
      <div class="card ">
        <div class="card-header ">
        </div>
        <div class="card-body ">
          <div id="grafik2"></div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

  <script>
    // console.log({!!json_encode($data)!!})

    $("#filterdata").click(()=>{
      var tglawal = $("#mindate").val()
      var tglakhir = $("#maxdate").val()
      var pilihfilter = $("#pilihfilter").val()
      axios.post("{{url('filterdata')}}",{pilihfilter, tglawal,tglakhir})
        .then((res)=>{
          chartdata.series[0].update({
            data: res.data.datatable
          }, true);

          $(".jumlahbarang").html(res.data.count)
          $(".stokbarang").html(res.data.total)
          $(".barangmasuk").html(res.data.barang_masuk)
          $(".barangkeluar").html(res.data.total_keluar)
        })
    });

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
            data: {!!json_encode($data)!!}
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


    $("#filterdata_bk").click(()=>{
      var tglawal = $("#mindate2").val()
      var tglakhir = $("#maxdate2").val()
      var filter_bk = $("#filter_bk").val()
      console.log(tglawal, tglakhir, filter_bk);
      axios.post("{{url('filterdata_bk')}}",{filter_bk, tglawal, tglakhir})
        .then((res)=>{
          // console.log(res.data);
          chartdata2.series[0].update({
            data: res.data
          }, true);
        })

    });

    var chartdata2 = Highcharts.chart('grafik2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Barang Keluar'
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
            data: false
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
@endsection