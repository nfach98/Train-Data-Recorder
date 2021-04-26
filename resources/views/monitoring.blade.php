@extends('layouts.main')

@section('script')
  <script type="text/javascript">
    window.onload = function () {
      var optionsSlope = {
        chart: {
          type: 'line',
          height: '300',
        },
        series: [{
          name: 'sales',
          data: [30,40,35,50,49,60,70,91,125]
        }],
        xaxis: {
          categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        }
      }

      var chartSlope = new ApexCharts(document.querySelector("#chart-slope"), optionsSlope);
      chartSlope.render();

      var optionsTemperature = {
        chart: {
          type: 'line',
          height: '300',
        },
        series: [{
          name: 'sales',
          data: [30,40,35,50,49,60,70,91,125]
        }],
        xaxis: {
          categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        }
      }

      var chartTemperature = new ApexCharts(document.querySelector("#chart-temperature"), optionsTemperature);
      chartTemperature.render();
    }
  </script>
@endsection

@section('page')
  <div class="container-fluid" style="margin-top: 15px; margin-bottom: 15px;">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      </div>

      <div class="col-12 mb-4">
          <div class="card shadow h-100 py-2">
              <div class="card-body">
                  <div class="row align-items-top mb-3">
                      <div class="col mr-5">
                          <div class="text-xs font-weight-bold text-uppercase mb-1">Kemiringan</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: var(--red);"></i>
                      </div>
                  </div>

                  <div id="chart-slope" style="width: 100%;"></div>
              </div>
          </div>
      </div>

      <div class="col-12 mb-4">
          <div class="card shadow h-100 py-2">
              <div class="card-body">
                  <div class="row align-items-top mb-3">
                      <div class="col mr-5">
                          <div class="text-xs font-weight-bold text-uppercase mb-1">Temperatur Bearing</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: var(--red);"></i>
                      </div>
                  </div>

                  <div id="chart-temperature" style="width: 100%;">
              </div>
          </div>
      </div>

      <!-- <div class="row">
          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top mb-3">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Kemiringan</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>

                      <div id="chart" style="width: 100%;">
                  </div>
              </div>
          </div>

          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Waktu Beroperasi</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">27.5</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-stopwatch fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div> -->
  </div>
@endsection