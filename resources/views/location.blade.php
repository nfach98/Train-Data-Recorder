@extends('layouts.main')

@section('script')
    <script type="text/javascript">
      window.onload = function () {
        mapboxgl.accessToken = 'pk.eyJ1IjoibmZhY2g5OCIsImEiOiJja214aGkzd2Uwb3o1MnBtOWR0c3NyMGJvIn0.yIkMVzbHjJBHp7UHH4r4wQ';
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [-96, 37.8],
          zoom: 5
        });

        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
            enableHighAccuracy: true
            },
            trackUserLocation: true
          })
        );
        map.addControl(new mapboxgl.NavigationControl());
      }
    </script>
@endsection

@section('page')
    <div class="container-fluid px-0 py-0">
        <div class="w-100" id="map" style='height: calc(100vh - 80px);'></div>
    </div>
@endsection