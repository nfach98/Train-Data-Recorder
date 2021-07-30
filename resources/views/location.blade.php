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

      @media only screen and (max-width: 600px) {
        #btn-center{
          margin-bottom: 5rem;
        }
      }
    </style>

    <script type="text/javascript">
      window.onload = function () {
        mapboxgl.accessToken = 'pk.eyJ1IjoibmZhY2g5OCIsImEiOiJja214aGkzd2Uwb3o1MnBtOWR0c3NyMGJvIn0.yIkMVzbHjJBHp7UHH4r4wQ';

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

            var map = new mapboxgl.Map({
              container: 'map',
              style: 'mapbox://styles/mapbox/streets-v11',
              center: [data.longitude, data.latitude],
              zoom: 15
            });

            map.addControl(new mapboxgl.GeolocateControl({
                positionOptions: {
                  enableHighAccuracy: true
                },
                trackUserLocation: true
              })
            );

            map.addControl(new mapboxgl.NavigationControl());

            map.addControl(new mapboxgl.FullscreenControl());

            map.on('load', function () {
              var urlTrain = '/images/icon-train.png';

              map.loadImage(
                urlTrain,
                function (error, image) {
                  if (error) throw error;
                  
                  map.addImage('train', image);
                  
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

              map.flyTo({
                center: [data.longitude, data.latitude],
                speed: 1
              });

              setInterval( function() {
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
                    getRoute([data.start_longitude, data.start_latitude], [data.end_longitude, data.end_latitude]);

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

                    $("#btn-center").click(function(){
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
            <button id="btn-center" class="btn btn-primary btn-circle">
                <i class="fas fa-subway px-1 py-1" style="font-size: 2rem;"></i>
            </button>
        </div>
    </div>
@endsection