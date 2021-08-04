@extends('layouts.main')

@section('script')
    <style type="text/css">
      #btn-center{
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1;
        margin: 1rem;
      }

      #distance {
        position: absolute;
        top: 0;
        z-index: 1;
        margin: 1rem;
        padding: 1rem;
        border-radius: .5rem;
        background-color: var(--red);
        display: none;
        color: white;
      }

      #text-distance {
        font-weight: bold;
      }

      @media only screen and (max-width: 600px) {
        #btn-center{
          margin-bottom: 5rem;
        }
      }
    </style>

    <script type="text/javascript">
      window.onload = function () {
        mapboxgl.accessToken = 'pk.eyJ1IjoibmZhY2g5OCIsImEiOiJja214aGkzd2Uwb3o1MnBtOWR0c3NyMGJvIn0.yIkMVzbHjJBHp7UHH4r4wQ';

        // Request data motorcar sesuai id train dari user 
        $.ajax({
          url: "/motorcar",
          type: "GET",
          data: {
            _token:'{{ csrf_token() }}',
            id: {!! Auth::user()->id_train !!}
          },
          cache: false,
          dataType: 'json',
          success: function(data){
            // Fungsi untuk menghitung jarak 2 titik dengan haversine
            function haversineDistance(coords1, coords2) {
              // Fungsi mengubah ke radian
              function toRad(x) {
                return x * Math.PI / 180;
              }

              var lon1 = coords1[0];
              var lat1 = coords1[1];

              var lon2 = coords2[0];
              var lat2 = coords2[1];

              var R = 6371; // 6371 untuk km, 6371000 untuk m

              var x1 = lat2 - lat1;
              var dLat = toRad(x1);
              var x2 = lon2 - lon1;
              var dLon = toRad(x2)
              var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
              var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
              var d = R * c;

              // Tampilkan text jarak
              $("#distance").show();

              // Set text jarak dengan hasil perhitungan haversine
              $("#text-distance").text("Jarak ditempuh: " + d.toFixed(4) + " km");
            }

            // Fungsi untuk mendapatkan rute dari 2 titik
            function getRoute(start, end) {
              var url = 'https://api.mapbox.com/directions/v5/mapbox/driving-traffic/' + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

              var req = new XMLHttpRequest();
              req.open('GET', url, true);
              req.onload = function() {
                var json = JSON.parse(req.response);
                var data = json.routes[0];
                var route = data.geometry.coordinates;
                var geojson = {
                  type: 'Feature',
                  properties: {},
                  geometry: {
                    type: 'LineString',
                    coordinates: route
                  }
                };

                if (map.getSource('route')) {
                  map.getSource('route').setData(geojson);
                } else {
                  map.addLayer({
                    id: 'route',
                    type: 'line',
                    source: {
                      type: 'geojson',
                      data: {
                        type: 'Feature',
                        properties: {},
                        geometry: {
                          type: 'LineString',
                          coordinates: geojson
                        }
                      }
                    },
                    layout: {
                      'line-join': 'round',
                      'line-cap': 'round'
                    },
                    paint: {
                      'line-color': '#3887be',
                      'line-width': 8,
                      'line-opacity': 0.75
                    }
                  });
                }
              };
              req.send();
            }

            // Deklarasi map
            var map = new mapboxgl.Map({
              container: 'map',
              style: 'mapbox://styles/mapbox/streets-v11',
              center: [data.longitude, data.latitude],
              zoom: 15
            });

            // Tambahkan user location
            map.addControl(new mapboxgl.GeolocateControl({
                positionOptions: {
                  enableHighAccuracy: true
                },
                trackUserLocation: true
              })
            );

            // Tambahkan fungsi navigasi map
            map.addControl(new mapboxgl.NavigationControl());

            // Tambahkan fungsi fullscreen map
            map.addControl(new mapboxgl.FullscreenControl());

            // Ketika map selesai dimuat
            map.on('load', function () {
              var urlTrain = '/images/icon-train.png';

              // Load gambar untuk peta
              map.loadImage(
                urlTrain,
                function (error, image) {
                  if (error) throw error;
                  
                  // Tambah gambar icon 'train'
                  map.addImage('train', image);
                  
                  // Buat data source 'point'
                  map.addSource('point', {
                    'type': 'geojson',
                    'data': {
                      'type': 'FeatureCollection',
                      'features': [{
                        'type': 'Feature',
                        'geometry': {
                          'type': 'Point',
                          'coordinates': []
                        }
                      }]
                    }
                  });
                   
                  // Buat layer berdasarkan data 'point' dan icon 'train'
                  map.addLayer({
                    'id': 'points',
                    'type': 'symbol',
                    'source': 'point',
                    'layout': {
                      'icon-image': 'train',
                      'icon-size': 0.25
                    }
                  });
                }
              );

              // Pusatkan map ke posisi kereta saat ini
              map.flyTo({
                center: [data.longitude, data.latitude],
                speed: 1
              });

              // Ekseskusi fungsi setiap 1000 milisecond
              setInterval( function() {
                // Request data motorcar sesuai id train dari user 
                $.ajax({
                  url: "/motorcar",
                  type: "GET",
                  data: {
                    _token:'{{ csrf_token() }}',
                    id: {!! Auth::user()->id_train !!}
                  },
                  cache: false,
                  dataType: 'json',
                  success: function(data){
                    // Jika sukses request motorcar, buat rute dan ukur jarak dengan haversine
                    getRoute([data.start_longitude, data.start_latitude], [data.end_longitude, data.end_latitude]);
                    haversineDistance([data.start_longitude, data.start_latitude], [data.longitude, data.latitude]);

                    // Set data source 'point' dengan posisi kereta saat ini
                    map.getSource('point').setData({
                      'type': 'FeatureCollection',
                      'features': [
                        {
                        'type': 'Feature',
                        'geometry': {
                          'type': 'Point',
                          'coordinates': [data.longitude, data.latitude]
                          }
                        }
                      ]
                    });

                    // Setting onclick button kereta
                    $("#btn-center").click(function(){
                      // Pusatkan map ke posisi kereta saat ini
                      map.flyTo({
                        center: [data.longitude, data.latitude],
                        speed: 1
                      });
                    });
                  },
                  error: function(XMLHttpRequest, status, error) { 
                    console.log(error);
                  }
                });
              }, 1000);
            });
          },
          error: function(XMLHttpRequest, status, error) { 
            console.log(error);
          }
        });
      }
    </script>
@endsection

@section('page')
    <div class="container-fluid px-0 py-0">
        <div class="w-100" id="map" style='height: calc(100vh - 80px);'>
            <div id="distance">
                <p id="text-distance" class="mb-0"></p>
            </div>

            <button id="btn-center" class="btn btn-primary btn-circle">
                <i class="fas fa-subway px-1 py-1" style="font-size: 2rem;"></i>
            </button>
        </div>
    </div>
@endsection