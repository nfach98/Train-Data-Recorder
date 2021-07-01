@extends('layouts.main')

@section('script')
    <script type="text/javascript">
      window.onload = function () {
        mapboxgl.accessToken = 'pk.eyJ1IjoibmZhY2g5OCIsImEiOiJja214aGkzd2Uwb3o1MnBtOWR0c3NyMGJvIn0.yIkMVzbHjJBHp7UHH4r4wQ';

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

            map.on('load', function () {
              setInterval( function() {
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
                      map.getSource('train').setData({
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
       
                      map.flyTo({
                        center: [data.longitude, data.latitude],
                        speed: 1
                      });
                  },
                  error: function(XMLHttpRequest, status, error) { 
                    console.log(error);
                  }
                });
              }, 1000);

              map.addSource('train', { 
                type: 'geojson', 
                data: {
                  'type': 'FeatureCollection',
                  'features': [
                    {
                    'type': 'Feature',
                    'geometry': {
                      'type': 'Point',
                      'coordinates': [-77.4144, 25.0759]
                      }
                    }
                  ]
                } 
              });

              map.addLayer({
                'id': 'train',
                'type': 'symbol',
                'source': 'train',
                'layout': {
                  'icon-image': 'rocket-15'
                }
              });
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
        <div class="w-100" id="map" style='height: calc(100vh - 80px);'></div>
    </div>
@endsection