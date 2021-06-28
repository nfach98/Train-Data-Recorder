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
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">ID</div>
                                  <div class="col-4 text-right">2</div>
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
                                      <div class="row">
                                          <div class="chart-volt"></div>
                                          <div class="w-100 d-flex justify-content-center">Tegangan</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row">
                                          <div class="chart-arus"></div>
                                          <div class="w-100 d-flex justify-content-center">Arus</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row">
                                          <div class="chart-frekuensi"></div>
                                          <div class="w-100 d-flex justify-content-center">Frekuensi</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row">
                                          <div class="chart-daya"></div>
                                          <div class="w-100 d-flex justify-content-center">Daya</div>
                                      </div>
                                  </div>

                                  <div class="col-xl-4 col-md-6 col-sm-12 mb-1">
                                      <div class="row">
                                          <div class="chart-energi"></div>
                                          <div class="w-100 d-flex justify-content-center">Energi</div>
                                      </div>
                                  </div>
                              </div>

                              <!-- <div class="row">
                                  <div class="col text-xs">Tegangan</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Arus</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Frekuensi</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                               <div class="row">
                                  <div class="col text-xs">Daya</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                               <div class="row">
                                  <div class="col text-xs">Energi</div>
                                  <div class="col-4 text-right">2</div>
                              </div> -->
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
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Longitude</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Kecepatan</div>
                                  <div class="col-4 text-right">2</div>
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
            startAngle: -90,
            endAngle: 90,
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

    var chartVolt = new ApexCharts(document.querySelector(".chart-volt"), options);
    chartVolt.render();

    var chartArus = new ApexCharts(document.querySelector(".chart-arus"), options);
    chartArus.render();

    var chartFrekuensi = new ApexCharts(document.querySelector(".chart-frekuensi"), options);
    chartFrekuensi.render();

    var chartDaya = new ApexCharts(document.querySelector(".chart-daya"), options);
    chartDaya.render();

    var chartEnergi = new ApexCharts(document.querySelector(".chart-energi"), options);
    chartEnergi.render();

    $(document).ready(function() {
      setInterval(function(){
        $.ajax({
          url: "/motorcar",
          type: "POST",
          data: { 
            _token:'{{ csrf_token() }}',
            id: 1
          },
          cache: false,
          dataType: 'json',
          success: function(data){
              console.log(data);

              chartArus.updateSeries([data.arus / 10 * 100]);

              // var optionsVolt = options;
              // optionsVolt.series = [70];
              // var chartVolt = new ApexCharts(document.querySelector(".chart-volt"), optionsVolt);
              // chartVolt.render();

              // var optionsArus = options;
              // optionsArus.series = [data.arus / 10 * 100];
              // var chartArus = new ApexCharts(document.querySelector(".chart-arus"), optionsArus);
              // chartArus.render();

              // var optionsFrekuensi = options;
              // optionsFrekuensi.series = [80];
              // var chartFrekuensi = new ApexCharts(document.querySelector(".chart-frekuensi"), optionsFrekuensi);
              // chartFrekuensi.render();

              // var optionsDaya = options;
              // optionsDaya.series = [80];
              // var chartDaya = new ApexCharts(document.querySelector(".chart-daya"), optionsDaya);
              // chartDaya.render();

              // var optionsEnergi = options;
              // optionsEnergi.series = [80];
              // var chartEnergi = new ApexCharts(document.querySelector(".chart-energi"), optionsEnergi);
              // chartEnergi.render();
          },
          error: function(XMLHttpRequest, status, error) { 
            console.log(error);
          }
        });
      }, 2000);
    });
  </script>

@endsection