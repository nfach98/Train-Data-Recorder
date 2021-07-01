@extends('layouts.main')

@section('page')
  <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>

      <div class="row">
          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Info Kereta</div>
                              <div class="row">
                                  <div class="col text-xs">Nama</div>
                                  <div class="col-4 text-right">{{ $train->nama }}</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">ID</div>
                                  <div class="col-4 text-right">{{ $train->id }}</div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-subway fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Kelistrikan</div>

                              <div class="row w-100 mb-3">
                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row d-flex flex-column justify-content-center">
                                          <div class="chart-volt"></div>
                                          <div class="d-flex justify-content-center bg-transparent">Tegangan (V)</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row d-flex flex-column justify-content-center">
                                          <div class="chart-arus"></div>
                                          <div class="d-flex justify-content-center bg-transparent">Arus (A)</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row d-flex flex-column justify-content-center">
                                          <div class="chart-frekuensi"></div>
                                          <div class="d-flex justify-content-center bg-transparent">Frekuensi (Hz)</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row d-flex flex-column justify-content-center">
                                          <div class="chart-daya"></div>
                                          <div class="d-flex justify-content-center bg-transparent">Daya (W)</div>
                                      </div>
                                  </div>

                                  <!-- <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row">
                                          <div class="chart-energi"></div>
                                          <div class="w-100 d-flex justify-content-center">Energi</div>
                                      </div>
                                  </div> -->
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-bolt fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Lokasi</div>
                              <div class="row">
                                  <div class="col text-xs">Latitude</div>
                                  <div id="text-lat" class="col-4 text-right"></div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Longitude</div>
                                  <div id="text-lng" class="col-4 text-right"></div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Kecepatan</div>
                                  <div class="col-4 text-right"></div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
    var options = {
        series: [0],
        chart: {
          type: 'radialBar',
          sparkline: {
            enabled: true
          }
        },
        colors: ["#DE0618"],
        plotOptions: {
          radialBar: {
            startAngle: -105,
            endAngle: 105,
            track: {
              background: "#e7e7e7",
              strokeWidth: '100%',
              margin: 5,
            },
            dataLabels: {
              name: {
                show: false
              },
              value: {
                offsetY: -2,
                fontSize: '40px',
                formatter: function (val) {
                  return val
                }
              }
            }
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            shadeIntensity: 0.2,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 100]
          },
        },
        labels: ['Average Results'],
    };

    var optVolt = options;
    optVolt.plotOptions.radialBar.dataLabels.value.formatter =  function (val) {
      return val / 100 * (300 - 200) + 200
    };
    var chartVolt = new ApexCharts(document.querySelector(".chart-volt"), optVolt);
    chartVolt.render();

    var optArus = options;
    optArus.plotOptions.radialBar.dataLabels.value.formatter =  function (val) {
      return val / 100 * 10
    };
    var chartArus = new ApexCharts(document.querySelector(".chart-arus"), optArus);
    chartArus.render();

    var optFrekuensi = options;
    optFrekuensi.plotOptions.radialBar.dataLabels.value.formatter =  function (val) {
      return val / 100 * (60 - 40) + 40
    };
    var chartFrekuensi = new ApexCharts(document.querySelector(".chart-frekuensi"), optFrekuensi);
    chartFrekuensi.render();

    var optDaya = options;
    optDaya.plotOptions.radialBar.dataLabels.value.formatter =  function (val) {
      return val / 100 * (50 - 0) + 0
    };
    var chartDaya = new ApexCharts(document.querySelector(".chart-daya"), optDaya);
    chartDaya.render();

    // var chartEnergi = new ApexCharts(document.querySelector(".chart-energi"), options);
    // chartEnergi.render();

    $(document).ready(function() {
      setInterval(function(){
        $.ajax({
          url: "/motorcar",
          type: "POST",
          data: { 
            _token:'{{ csrf_token() }}',
            id: {!! Auth::user()->id_train !!}
          },
          cache: false,
          dataType: 'json',
          success: function(data){
              chartVolt.updateSeries([(data.tegangan - 200) / (300 - 200) * 100]);
              chartArus.updateSeries([(data.arus - 0) / (10 - 0) * 100]);
              chartFrekuensi.updateSeries([(data.frekuensi - 40) / (60 - 40) * 100]);
              chartDaya.updateSeries([(data.daya - 0) / (50 - 0) * 100]);

              $("#text-lat").html(function(i, original){
                return data.latitude; 
              });

              $("#text-lng").html(function(i, original){
                return data.longitude; 
              });
          },
          error: function(XMLHttpRequest, status, error) { 
            console.log(error);
          }
        });
      }, 1000);
    });
  </script>

@endsection