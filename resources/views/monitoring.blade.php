@extends('layouts.main')

@section('script')
  <script type="text/javascript">
    window.onload = function () {
      // Kemiringan
      var optionsSlope = {
        chart: {
          type: 'line',
          height: '300',
          fontFamily: 'Ubuntu, sans-serif',
        },
        series: [{
          name: 'sales',
          data: []
        }],
        colors: ['#DE0618'],
        xaxis: {
          categories: []
        }
      }
      var chartSlope = new ApexCharts(document.querySelector("#chart-slope"), optionsSlope);
      chartSlope.render();

      // Suhu
      var optionsTemperature = {
        chart: {
          type: 'line',
          height: '300',
        },
        series: [{
          name: 'sales',
          data: [30,40,35,50,49,60,70,91,125]
        }],
        colors: ['#DE0618'],
        xaxis: {
          categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        }
      }
      var chartTemperature = new ApexCharts(document.querySelector("#chart-temperature"), optionsTemperature);
      chartTemperature.render();

      // Kelistrikan
      var optionsElectricity = {
        chart: {
          type: 'line',
          height: '300',
          fontFamily: 'Ubuntu, sans-serif',
        },
        series: [{
          name: 'sales',
          data: [null,null,null,null,null,null,null,null,125]
        }],
        colors: ['#DE0618'],
        xaxis: {
          categories: [1991,1992,1993,1994,1995,1996,1997,1998,1999]
        }
      }

      var chartElectricity = new ApexCharts(document.querySelector("#chart-electricity"), optionsElectricity);
      chartElectricity.render();

      setInterval(function(){
        $.ajax({
          url: "/motorcar-all",
          type: "POST",
          data: {
            _token:'{{ csrf_token() }}',
            id: 1
          },
          cache: false,
          dataType: 'json',
          success: function(data){
              console.log(data);
              var slopes = [];

              data.forEach(function(item, index) {
                slopes.push(item.kemiringan);
              });

              chartSlope.updateSeries([{
                name: 'Kemiringan',
                data: slopes
              }]);
          },
          error: function(XMLHttpRequest, status, error) { 
            console.log(error);
          }
        });
      }, 1000);
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
                          <i class="fas fa-drafting-compass fa-2x text-gray-300" style="color: var(--red);"></i>
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
                          <i class="fas fa-thermometer-half fa-2x text-gray-300" style="color: var(--red);"></i>
                      </div>
                  </div>

                  <div id="chart-temperature" style="width: 100%;"></div>
              </div>
          </div>
      </div>

      <div class="col-12 mb-4">
          <div class="card shadow h-100 py-2">
              <div class="card-body">
                  <div class="row align-items-top mb-3">
                      <div class="col mr-5">
                          <div class="text-xs font-weight-bold text-uppercase mb-1">Kelistrikan</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-bolt fa-2x text-gray-300" style="color: var(--red);"></i>
                      </div>
                  </div>

                  <div id="chart-electricity" style="width: 100%;"></div>
              </div>
          </div>
      </div>
  </div>
@endsection