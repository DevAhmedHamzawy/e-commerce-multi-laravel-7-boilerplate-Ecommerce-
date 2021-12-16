@extends('main.layouts.app')

@section('title') خريطة المتاجر فى المملكة @endsection

@section('header')
<script src="http://maps.google.com/maps/api/js?libraries=places&key=AIzaSyDqET1nIDZzMGEieGANkEF_xB1RSCkJTjk&language=AR"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


<style type="text/css">
  #mymap {
        border:1px solid red;
        width: 100%;
        height: 1000px;
  }
</style>
@endsection


@section('content')
    <div id="mymap"></div>
@endsection



@section('footer')
    <script>
        var locations = <?php print_r(json_encode($locations)) ?>;

        //console.log(locations);

var mymap = new GMaps({
  el: '#mymap',
  lat: 24.774265,
  lng: 46.738586,
  zoom: 6
});



$.each( locations, function( index, value ){
    let marker = mymap.addMarker({
      lat: value.lat,
      lng: value.lng,
      title: value.user_name,
      infoWindow: {
        content: "<a target='_blank' href='{!! url('/the_all_vendors/"+value.user_name+"') !!}'><div class='box'><img src='http://127.0.0.1:8000/storage/main/admins/"+value.img+"' width='50' height='50'><div class='text'><h1>"+value.user_name+"</h1></a>"
      }
    });
    
});


    </script>
@endsection