@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


                <div class="card">
                    <div class="card-header"> <h5 class="text-center"> إعدادات العضو </h5> </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('v_settings.update', $vendor->user_name) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')


                            <div class="col-md-12" id="the_icon">
                                <img src="{{ $vendor->img_path }}" class="the_image_changing"  onclick="document.getElementById('image').click()" alt="Cinque Terre">
                                <h5 class="text-center" style="margin-top: -15px;">إرفع صورة من هنا</h5>
                                <p class="text-center">ملاحظة :-
                                    <br>
                                    - ابعاد الصورة يجب ان تكون 500 * 500
                                    <br>
                                    - حجم الصورة لا يزيد عن 1 ميجابايت
                                    <br>
                                    - امتداد الصورة يجب ان يكون jpeg | jpg | png | gif
                                </p>
                                <input  style="display: none;"  id="image" type="file" name="main_image" value="profile-45x45.png">
                            </div>
                            <br>
    

                            {{--<div class="form-group row">

                                <label class="col-md-2 col-form-label text-md-right">المنطقة</label>

                                <select class="col-md-10 form-control selectOption required" onchange="getCities(this);" required>
                                    <option>اختر المنطقة</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->name }}" @if ($area->id == $theArea->parent_id) selected @endif>{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                  
                            <div class="form-group row">

                                <label class="col-md-2 col-form-label text-md-right">المدينة</label>

                                <select class="col-md-10 form-control selectOption required" name="area_id" id="area_id" required>
                                    <option>اختر المدينة</option>
                                </select>													
                            </div>--}}

                            <div class="form-group row">
                                <label for="user_name" class="col-md-2 col-form-label text-md-right">إسم العضو</label>

                                <div class="col-md-10">
                                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ $vendor->user_name }}" required autocomplete="user_name" autofocus>

                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">البريد الإلكترونى</label>
    
                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $vendor->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                       {{-- <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">كلمة المرور</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                        <div class="form-group row">
                            <label for="telephone" class="col-md-2 col-form-label text-md-right">رقم التليفون</label>

                            <div class="col-md-10">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $vendor->telephone }}" required autocomplete="telephone">

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">عن المتجر</label>

                            <div class="col-md-10">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror textarea" cols="30" rows="10" required>{{ $vendor->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">العنوان على الخريطة</label>
                                <div id="map" class="col-md-10 form-group" style="height:550px;"></div>
                                <input type="hidden" name="latlng" id="latlng" />
                        </div>

                        <div class="form-group row">
                            <label for="facebook" class="col-md-2 col-form-label text-md-right">{{ __('Facebook') }} </label>

                            <div class="col-md-10">
                                <input id="facebook" type="url" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $vendor->facebook }}" autocomplete="facebook" autofocus>

                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="googleplus" class="col-md-2 col-form-label text-md-right">{{ __('googleplus') }}</label>

                            <div class="col-md-10">
                                <input id="googleplus" type="url" class="form-control @error('googleplus') is-invalid @enderror" name="googleplus" value="{{ $vendor->googleplus }}" autocomplete="googleplus" autofocus>

                                @error('googleplus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="youtube" class="col-md-2 col-form-label text-md-right">{{ __('youtube') }}</label>

                            <div class="col-md-10">
                                <input id="youtube" type="url" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ $vendor->youtube }}" autocomplete="youtube" autofocus>

                                @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="twitter" class="col-md-2 col-form-label text-md-right">{{ __('twitter') }} <span style="color:#ff0000">*</span> </label>

                            <div class="col-md-10">
                                <input id="twitter" type="url" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $vendor->twitter }}" required autocomplete="twitter" autofocus>

                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="telegram" class="col-md-2 col-form-label text-md-right">{{ __('telegram') }}</label>

                            <div class="col-md-10">
                                <input id="telegram" type="url" class="form-control @error('telegram') is-invalid @enderror" name="telegram" value="{{ $vendor->telegram }}" autocomplete="telegram" autofocus>

                                @error('telegram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="whatsapp" class="col-md-2 col-form-label text-md-right">{{ __('whatsapp') }} <span style="color:#ff0000">*</span></label>

                            <div class="col-md-10">
                                <input id="whatsapp" type="url" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ $vendor->whatsapp }}" required autocomplete="whatsapp" autofocus>

                                @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="snapchat" class="col-md-2 col-form-label text-md-right">{{ __('snapchat') }} <span style="color:#ff0000">*</span></label>

                            <div class="col-md-10">
                                <input id="snapchat" type="url" class="form-control @error('snapchat') is-invalid @enderror" name="snapchat" value="{{ $vendor->snapchat }}" required autocomplete="snapchat" autofocus>

                                @error('snapchat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="linkedin" class="col-md-2 col-form-label text-md-right">{{ __('linkedin') }}</label>

                            <div class="col-md-10">
                                <input id="linkedin" type="url" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ $vendor->linkedin }}" autocomplete="linkedin" autofocus>

                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maroof" class="col-md-2 col-form-label text-md-right">{{ __('maroof') }} <span style="color:#ff0000">*</span></label>

                            <div class="col-md-10">
                                <input id="maroof" type="url" class="form-control @error('maroof') is-invalid @enderror" name="maroof" value="{{ $vendor->maroof }}" required autocomplete="maroof" autofocus>

                                @error('maroof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                   
                        <h5>أقـــــســــام الـــمـــنــتـــجـــيـــن</h5>
                        <div class="row" style="margin: 0 5%">
                            @foreach($producers_categories as $key => $value) 
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="producers_categories[{{ $value->id }}]" @if(in_array($value->id, $vendor_producers)) checked @endif  id="inlineRadio1" value="{{ $key }}"><label class="form-check-label" for="inlineRadio1">{{  $value->name  }}</label></div>
                            @endforeach
                        </div>
                        
                        <hr>

                        <h5>أقـــــســـــام الـــمـــتـــاجــــر</h5>
                        <div class="row" style="margin: 0 5%">
                            @foreach($stores_categories as $key => $value) 
                            <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="stores_categories[{{ $value->id }}]"  @if(in_array($value->id, $vendor_stores)) checked @endif  id="inlineRadio1" value="{{ $key }}"><label class="form-check-label" for="inlineRadio1">{{  $value->name  }}</label></div>
                            @endforeach
                        </div>
                       

                        <br><br>


                        <h5>الـــــخـــــدمـــــات</h5>

                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="training" @if($vendor->training[0] !== null && $vendor->training[1] != null) checked @endif  id="training"><label class="form-check-label" for="inlineRadio1">إستشارات وتدريب</label></div>

                        <div class="training" @unless($vendor->training[0] !== null && $vendor->training[1] != null) style="display: none;" @endif >
                            <input type="text" name="training[]" placeholder="السعر" value="{{ $vendor->training[0] }}" class="form-control">
                            <br>
                            <textarea name="training[]" id="description" cols="30" rows="10" placeholder="الوصف">{{ $vendor->training[1] }}</textarea>
                        </div>

                        <br><br>

                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="services" @if($vendor->services[0] !== null && $vendor->services[1] != null) checked @endif  id="services"><label class="form-check-label" for="inlineRadio1">خدمات مساندة</label></div>

                        <div class="services"  @unless($vendor->services[0] !== null && $vendor->services[1] != null) style="display: none;" @endif >
                            <input type="text" name="services[]" placeholder="السعر" value="{{ $vendor->services[0] }}" class="form-control">
                            <br>
                            <textarea name="services[]" id="description" cols="30" rows="10" placeholder="الوصف">{{ $vendor->services[1] }}</textarea>
                        </div>

                        <br><br>

                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="transporting" @if($vendor->transporting[0] !== null && $vendor->transporting[1] != null) checked @endif id="transporting"><label class="form-check-label" for="inlineRadio1">خدمات النقل ( مواشي وبضائع) فردي خاص و مؤسسات وشركات</label></div>

                        <div class="transporting"  @unless($vendor->transporting[0] !== null && $vendor->transporting[1] != null) style="display: none;" @endif>
                            <input type="text" name="transporting[]" placeholder="السعر" value="{{ $vendor->transporting[0] }}" class="form-control">
                            <br>
                            <textarea name="transporting[]" id="description" cols="30" rows="10" placeholder="الوصف">{{ $vendor->transporting[1] }}</textarea>
                        </div>
                      



    

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    تعديل
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection


@section('footer')


    <script>

        /*$(document).ready(function () {
            let item = {};
            item.value = '{{-- $theAreaParentName->name --}}';
            getCities(item);
        });*/

    </script>

    <script>
        function changeImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('.the_image_changing').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            changeImage(this);
        });
  

        $("#training").click( function(){
            if($(this).is(':checked')) { 
                $('.training').css('display', 'block');
            }else{
                $('.training').css('display', 'none');
            }
        });

        $("#services").click( function(){
            if($(this).is(':checked')) { 
                $('.services').css('display', 'block');
            }else{
                $('.services').css('display', 'none');
            }
        });

        $("#transporting").click( function(){
            if($(this).is(':checked')) { 
                $('.transporting').css('display', 'block');
            }else{
                $('.transporting').css('display', 'none');
            }
        });

        function getCities(item){
            axios.get('../../../list_areas/'+item.value)
                .then((data) => {
                $('#area_id').empty()
                for(city of data.data){
                $('#area_id').append('<option value="'+city.id+'" data-lat="'+city.latitude+'" data-lng="'+city.longitude+'">'+city.name+'</option>')
                }  
                })
        }
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyDqET1nIDZzMGEieGANkEF_xB1RSCkJTjk" async defer></script>

    <script>
        function initMap(lat =  null, lng = null) {
        
        lat = {!! auth()->user()->lat ?? 0 !!};
        
        lng = {!! auth()->user()->lng ?? 0 !!};
        
        
        if(!lat){ var myLatLng = {lat: 24.774265, lng: 46.738586} } else{ var myLatLng = {lat, lng} } ;
    
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
        //let lat = {!! auth()->user()->lat !!};
        //let lng = {!! auth()->user()->lng !!};
        //initMap(Math.floor(lat), Math.floor(lng));
        }
        
    </script>

@endsection