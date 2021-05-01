@extends('layouts.main')

@section('script')
    <script type="text/javascript">
      window.onload = function () {
        mapboxgl.accessToken = 'pk.eyJ1IjoibmZhY2g5OCIsImEiOiJja214aGkzd2Uwb3o1MnBtOWR0c3NyMGJvIn0.yIkMVzbHjJBHp7UHH4r4wQ';
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11'
        });
      }
    </script>
@endsection

@section('page')
    <div class="container-fluid">
        <div class="w-100" id="map" style='height: 300px;'></div>
    </div>
@endsection