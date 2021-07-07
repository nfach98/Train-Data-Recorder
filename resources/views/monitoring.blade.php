@extends('layouts.main')

@section('script')
  <script type="text/javascript">
    window.onload = function () {
      // Kemiringan
      var optionsSlope = {
        chart: {
          animations: {
            enabled: true,
            easing: 'linear',
            speed: 500,
        },
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
          categories: [1991,1992,1993,1994,1995,1996,1997,1998,1999]
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
          data: [null,null,null,null,null,null,null,null,null]
        }],
        colors: ['#DE0618'],
        xaxis: {
          categories: [1991,1992,1993,1994,1995,1996,1997,1998,1999]
        }
      }

      var url = "";
      var type = "{!! str_replace("-", "", $type) !!}";
      console.log(type);

      if(type == "motorcar") {
        url = "/motorcar-all";
      }
      else {
        url = "/" + type;
      }

      if(type == "motorcar") {
        var optionsVolt = Object.assign({}, optionsElectricity);
        optionsVolt.colors = ['#17eb6f'];
        var chartLineVolt = new ApexCharts(document.querySelector("#chart-line-volt"), optionsVolt);
        chartLineVolt.render();

        var optionsArus = Object.assign({}, optionsElectricity);
        optionsArus.colors = ['#36e2f5'];
        var chartLineArus = new ApexCharts(document.querySelector("#chart-line-arus"), optionsArus);
        chartLineArus.render();

        var optionsFrekuensi = Object.assign({}, optionsElectricity);
        optionsFrekuensi.colors = ['#ffbb00'];
        var chartLineFrekuensi = new ApexCharts(document.querySelector("#chart-line-frekuensi"), optionsFrekuensi);
        chartLineFrekuensi.render();

        var optionsDaya = Object.assign({}, optionsElectricity);
        optionsDaya.colors = ['#000000'];
        var chartLineDaya = new ApexCharts(document.querySelector("#chart-line-daya"), optionsDaya);
        chartLineDaya.render();

        var optionsEnergi = Object.assign({}, optionsElectricity);
        optionsEnergi.colors = ['#fa28c2'];
        var chartLineEnergi = new ApexCharts(document.querySelector("#chart-line-energi"), optionsEnergi);
        chartLineEnergi.render();
      }

      setInterval(function(){
        $.ajax({
          url: url,
          type: "POST",
          data: {
            _token:'{{ csrf_token() }}',
            id: {!! Auth::user()->id_train !!}
          },
          cache: false,
          dataType: 'json',
          success: function(data){
              console.log(data);
              var dates = [];

              var slopes = [];
              var temperatures = [];

              var tegangan = [];
              var arus = [];
              var frekuensi = [];
              var daya = [];
              var energi = [];

              var dateOptions = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
              data.forEach(function(item, index) {
                const date = new Date(item.time);
                dates.push(date.toLocaleDateString("id-ID", dateOptions));

                slopes.push(item.kemiringan);
                temperatures.push(item.suhu_bearing);

                tegangan.push(item.tegangan);
                arus.push(item.arus);                
                frekuensi.push(item.frekuensi);
                daya.push(item.daya);
                energi.push(item.energi);
              });


              chartSlope.updateSeries([{
                name: 'Kemiringan',
                data: slopes
              }]);

              chartSlope.updateOptions({
                xaxis: {
                  categories: dates
                }
              });


              chartTemperature.updateSeries([{
                name: 'Temperatur Bearing',
                data: temperatures
              }]);

              chartTemperature.updateOptions({
                xaxis: {
                  categories: dates
                }
              });

              if(type == "motorcar"){
                chartLineVolt.updateSeries([{
                  name: 'Tegangan',
                  data: tegangan
                }]);

                chartLineVolt.updateOptions({
                  xaxis: {
                    categories: dates
                  }
                });

                chartLineArus.updateSeries([{
                  name: 'Arus',
                  data: arus
                }]);

                chartLineArus.updateOptions({
                  xaxis: {
                    categories: dates
                  }
                });

                chartLineFrekuensi.updateSeries([{
                  name: 'Frekuensi',
                  data: frekuensi
                }]);

                chartLineFrekuensi.updateOptions({
                  xaxis: {
                    categories: dates
                  }
                });

                chartLineDaya.updateSeries([{
                  name: 'Daya',
                  data: daya
                }]);

                chartLineDaya.updateOptions({
                  xaxis: {
                    categories: dates
                  }
                });

                chartLineEnergi.updateSeries([{
                  name: 'Energi',
                  data: energi
                }]);

                chartLineEnergi.updateOptions({
                  xaxis: {
                    categories: dates
                  }
                });
              }
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
          <h1 class="h3 mb-0 text-gray-800">{{ ucwords(str_replace("-", " ", $type)) }}</h1>
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

      @if ($type == "motor-car")
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

                  <div class="w-100 d-flex justify-content-center">Tegangan</div>
                  <div id="chart-line-volt" class="w-100 mb-5"></div>

                  <div class="w-100 d-flex justify-content-center">Arus</div>
                  <div id="chart-line-arus" class="w-100 mb-5"></div>

                  <div class="w-100 d-flex justify-content-center">Frekuensi</div>
                  <div id="chart-line-frekuensi" class="w-100 mb-5"></div>

                  <div class="w-100 d-flex justify-content-center">Daya</div>
                  <div id="chart-line-daya" class="w-100 mb-5"></div>

                  <div class="w-100 d-flex justify-content-center">Energi</div>
                  <div id="chart-line-energi" class="w-100 mb-5"></div>
              </div>
          </div>
      </div>
      @endif
  </div>
@endsection