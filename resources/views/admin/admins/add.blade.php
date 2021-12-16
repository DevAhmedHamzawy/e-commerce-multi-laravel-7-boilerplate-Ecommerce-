@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 class="text-center">

                    {{ $type == 0 ? 'بيانات العضو الجديد' : 'بيانات المدير الجديد' }}
                
                </h1>
                </div>
               
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admins.store') }}">
                        @csrf

                        <input type="hidden" name="type" value="{{ request()->type }}">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <img src="" alt="">
                            </div>
                        </div>


                        {{--<div class="form-group row">

                            <label class="col-md-2 col-form-label text-md-right">المنطقة</label>

                            <select class="col-md-10 form-control selectOption required" onchange="getCities(this);" required>
                                <option>اختر المنطقة</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->name }}">{{ $area->name }}</option>
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
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-right">الإسم الأول</label>

                            <div class="col-md-10">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-right">الإسم الأخير</label>

                            <div class="col-md-10">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">الوصف</label>

                            <div class="col-md-10">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror textarea" cols="30" rows="10" autocompleted="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">البريد الإلكترونى</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">كلمة المرور</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if ($type == 0)

                   
                        <h5>أقـــــســــام الـــمـــنــتـــجـــيـــن</h5>
                        <div class="row" style="margin: 0 5%">
                            @foreach($producers_categories as $key => $value) 
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="producers_categories[{{ $value->id }}]"  id="inlineRadio1" value="{{ $key }}"><label class="form-check-label" for="inlineRadio1">{{  $value->name  }}</label></div>
                            @endforeach
                        </div>
                        
                        <hr>

                        <h5>أقـــــســــام الـــمـــتـــاجــــر</h5>
                        <div class="row" style="margin: 0 5%">
                            @foreach($stores_categories as $key => $value) 
                            <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="stores_categories[{{ $value->id }}]"  id="inlineRadio1" value="{{ $key }}"><label class="form-check-label" for="inlineRadio1">{{  $value->name  }}</label></div>
                            @endforeach
                        </div>
                       

                        <br><br>


                        <h5>الـــــخـــــدمـــــات</h5>

                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="training"  id="training"><label class="form-check-label" for="inlineRadio1">إستشارات وتدريب</label></div>

                        <div class="training" style="display: none;">
                            <input type="text" name="training[]" placeholder="السعر" class="form-control">
                            <br>
                            <textarea name="training[]" id="description" cols="30" rows="10" placeholder="الوصف"></textarea>
                        </div>

                        <br><br>

                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="services"  id="services"><label class="form-check-label" for="inlineRadio1">خدمات مساندة</label></div>

                        <div class="services" style="display: none;">
                            <input type="text" name="services[]" placeholder="السعر" class="form-control">
                            <br>
                            <textarea name="services[]" id="description" cols="30" rows="10" placeholder="الوصف"></textarea>
                        </div>

                        <br><br>

                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="transporting"  id="transporting"><label class="form-check-label" for="inlineRadio1">خدمات النقل ( مواشي وبضائع) فردي خاص و مؤسسات وشركات</label></div>

                        <div class="transporting" style="display: none;">
                            <input type="text" name="transporting[]" placeholder="السعر" class="form-control">
                            <br>
                            <textarea name="transporting[]" id="description" cols="30" rows="10" placeholder="الوصف"></textarea>
                        </div>
                      


                        @endif


                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                {{ $type == 0 ? 'إضافة العضو الجديد' : 'إضافة المدير الجديد' }}
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

@endsection