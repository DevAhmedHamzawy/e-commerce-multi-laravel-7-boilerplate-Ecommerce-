@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header text-center">التعديل على المنطقة {{ $place->name }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('places.update' , $place->name) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">الإسم بالعربية</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $place->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="shipping_cost" class="col-md-2 col-form-label text-md-right">تكلفة الشحن</label>

                            <div class="col-md-10">
                                <input id="shipping_cost" type="number" class="form-control @error('shipping_cost') is-invalid @enderror" name="shipping_cost" value="{{ $place->shipping_cost }}">

                                @error('shipping_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div id="map" style="height:550px;"></div>
                                <input type="hidden" name="latlng" id="latlng" />
                            </div>
                        </div>
                     
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    تعديل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyDqET1nIDZzMGEieGANkEF_xB1RSCkJTjk" async defer></script>

<script>
    function initMap(lat = null, lng = null) {
    
    if(lat == null){ var myLatLng = {lat: 24.774265, lng: 46.738586} } else{ var myLatLng = {lat, lng} } ;
 
   var map = new google.maps.Map(document.getElementById('map'), {
     center: myLatLng,
     zoom: 6
   });
 
   var marker = new google.maps.Marker({
         position: myLatLng,
         map: map,
         title: 'Hello World!',
         draggable: true
       });
 
    google.maps.event.addListener(marker, 'dragend', function(marker) {
       var latLng = marker.latLng;
       document.getElementById('latlng').value = [latLng.lat(),latLng.lng()];
    });
    }


    function setMap(item)
    {
       let lat = $('option:selected', item).data("lat");
       let lng = $('option:selected', item).data("lng");
       initMap(Math.floor(lat), Math.floor(lng));
    }
    
</script>

@endsection