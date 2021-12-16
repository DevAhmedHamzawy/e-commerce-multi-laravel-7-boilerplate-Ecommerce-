@extends('admin.layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ url('admin/panel/css/tab.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header text-center">التعديل على المنتج {{ $v_product->name }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('v_products.update', $v_product->slug) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')


                        <div class="col-md-12" id="the_icon">
                            <img src="{{ $v_product->img_path }}" class="the_image_changing" onclick="document.getElementById('image').click()" alt="Cinque Terre">
                            <h5 class="text-center">إرفع صورة من هنا</h5>
                            <p class="text-center">ملاحظة :-
                                <br>
                                - ابعاد الصورة يجب ان تكون 500 * 500
                                <br>
                                - حجم الصورة لا يزيد عن 1 ميجابايت
                                <br>
                                - امتداد الصورة يجب ان يكون jpeg | jpg | png | gif
                            </p>
                            <input  style="display: none;"  id="image" type="file" name="main_image">
                        </div>


                        <div class="form-group row">
                            <label for="subcategories" class="col-md-2 col-form-label text-md-right">أقسام المنتجات</label>
                        
                            <div class="col-md-10">
                                <select  onchange="getSubCategories(this);" class="form-control">

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($theCategory == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="subcategories" class="col-md-2 col-form-label text-md-right">فروع أقسام المنتجات</label>
                        
                            <div class="col-md-10">
                                

                                <select class="category_id form-control" name="category_id" id="category_id"></select>
                                

                                </select>

                               

                                @error('category_id')
                                    <span class="invalid-feedback" country="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="code" class="col-md-2 col-form-label text-md-right">الكود</label>

                            <div class="col-md-10">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $v_product->code }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>--}}


                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">الإسم</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $v_product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">

                            <label for="appears" class="col-md-2 col-form-label text-md-right">تظهر فى</label>

                            <div class="col-md-10">
                                <input type="checkbox" name="groups" checked="1" @if($v_product->groups == 1) checked  @endif>
                                <label>المجموعات</label>
                               
                                &nbsp;&nbsp;&nbsp;&nbsp;
        
                                <input type="checkbox" name="offers" checked="1" @if($v_product->offers == 1) checked  @endif>
                                <label>العروض</label>
        
                                &nbsp;&nbsp;&nbsp;&nbsp;
        
                                <input type="checkbox" name="distributions" checked="1" @if($v_product->distributions == 1) checked  @endif>
                                <label>التوزيعات</label>
                            </div>
                         
                        </div>


                        
                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">السعر</label>

                            <div class="col-md-10">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $v_product->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="discount" class="col-md-2 col-form-label text-md-right">الخصم</label>

                            <div class="col-md-10">
                                <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $v_product->discount }}">

                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">الوصف</label>

                            <div class="col-md-10">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror textarea" cols="30" rows="10">{{ $v_product->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="shipping" class="col-md-2 col-form-label text-md-right">امكانية الشحن</label>

                            <div class="col-md-10">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping" id="inlineRadio1" value="1" @if($v_product->shipping == 1) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">نعم</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping" id="inlineRadio2" value="0" @if($v_product->shipping == 0) checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">لا</label>
                                </div>

                                @error('shipping')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="packing" class="col-md-2 col-form-label text-md-right">إمكانية التغليف</label>

                            <div class="col-md-10">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="packing" id="inlineRadio1" value="1" @if($v_product->packing == 1) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">نعم</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="packing" id="inlineRadio2" value="0" @if($v_product->packing == 0) checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">لا</label>
                                </div>

                                @error('packing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <hr>

                        <h3>الـــمـــنــاطـــق الـــمـــتـــاحـــة</h3>

                        <div class="tab">
                            @foreach ($areas as $area)
                                    @php $areaName = explode(' ' ,$area->name); $areaName[0] = $areaName[0].rand(0,9999);  @endphp
                                    <button class="tablinks" onclick="openCity(event, {{ $areaName[0] }});return false;">{{ $area->name }}</button>
                                    <div id="{{ $areaName[0] }}" class="tabcontent">
                                        @foreach ($area->children as $child)
                                            <input type="checkbox" name="available_areas[]" value="{{ $child->id }}">
                                            <label for="{{ $child->name }}">{{ $child->name }}</label>
                                            &nbsp; &nbsp; 
                                        @endforeach
                                    </div>
                            @endforeach
                        </div>


                        <div class="delivery_section" style="display: none">

                            <h3>إمــــكــــانـــيـــة الـــشـــحـــن</h3>

                            <div class="tabone">
                                @foreach ($areas as $area)
                                        @php $areaName = explode(' ' ,$area->name); $areaName[0] = $areaName[0].rand(0,9999);  @endphp
                                        <button class="tablinks" onclick="openCityOne(event, {{ $areaName[0] }});return false;">{{ $area->name }}</button>
                                        <div id="{{ $areaName[0] }}" class="tabcontentone">
                                            @foreach ($area->children as $child)
                                                <input type="checkbox" name="available_areas[]" value="{{ $child->id }}">
                                                <label for="{{ $child->name }}">{{ $child->name }}</label>
                                                &nbsp; &nbsp; 
                                            @endforeach
                                        </div>
                                @endforeach
                            </div>

                        </div>


                        <hr>

                        <h3>الـــــــخــــــدمـــــــات</h3>

                        @foreach ($services as $service)
                        
                            <input type="checkbox" name="services[]" value="{{ $service->id }}">
                            <label for="{{ $service->name }}" style="font-size: 25px; font-weight:bold;">{{ $service->name }}</label>

                            <div class="tabtwo">
                                @foreach ($areas as $area)
                                        @php $areaName = explode(' ' ,$area->name); $areaName[0] = $areaName[0].rand(0,9999);  @endphp
                                        <button class="tablinks" onclick="openCityTwo(event, {{ $areaName[0] }});return false;">{{ $area->name }}</button>
                                        <div id="{{ $areaName[0] }}" class="tabcontenttwo">
                                            @foreach ($area->children as $child)
                                                <input type="checkbox" name="services[][]" value="{{ $child->id }}">
                                                <label for="{{ $child->name }}">{{ $child->name }}</label>
                                                &nbsp; &nbsp; 
                                            @endforeach
                                        </div>
                                @endforeach
                            </div>
                        
                        @endforeach


                        @if (!$v_product->options == "null")

                        <div class="the_selected_options" style="display: block;">
                            @foreach ($v_product->category->options as $key => $value)
                                {{-- dd($selectedOptions[$value->id]) --}}
                                <div class="form-check form-check-inline"><h3><input class="form-check-input" type="checkbox" name="options[]" id="inlineRadio1" value="'+option.id+'"><label class="form-check-label" for="inlineRadio1">{{ $value->name }}</label></h3></div><br>
                                @foreach($value->the_options as $key1 => $value1)

                                    @if($selectedOptions[$value->id][$key1] === false)
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="the_other_options[{{ $value->id }}][]"  id="inlineRadio1" value="{{ $key1 }}"><label class="form-check-label" for="inlineRadio1">{{  $value1  }}</label></div>
                                    @else
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" checked name="the_other_options[{{ $value->id }}][]"  id="inlineRadio1" value="{{ $key1 }}"><label class="form-check-label" for="inlineRadio1">{{  $value1  }}</label></div>
                                    @endif
                                 
                                
                                @endforeach
                                <br>
                            @endforeach
                        </div>

                        <div class="the_options_one">

                           

                        </div>

                        @endif


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    إضافة
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
    
    <script>
       $(document).ready(function () {
            let itemone = {};
            itemone.value = '{!! $theCategory !!}';
            getSubCategories(itemone);
        });


        function getSubCategories(itemone){
            axios.get('../../../list_subcategories/'+itemone.value)
                .then((data) => {
                $('#category_id').empty()
                for(subcategory of data.data){
                    if(subcategory.id == {!! $theSubCategory->id ?? 0 !!}){
                        $('#category_id').append('<option value="'+subcategory.id+'" selected>'+subcategory.name+'</option>')
                    }else{
                        $('#category_id').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
                    }
                }  
            })
        }


        $('#category_id').on("change", function() {
            getOptions(this);
        });


        function getOptions(item){
            axios.get('../../../list_options/'+item.value)
                .then((data) => { 
                    $('.the_options_one').empty();
                    $('.the_options_one').append('<label for="description" class="col-md-12 col-form-label text-md-right"><h2 class="text-center">الإختيارات</h2></label>');

                    for(option of data.data){
                        //$('.the_options_one').append('<div class="row">');
                        $('.the_options_one').append('<div class="form-check form-check-inline"><h3><input class="form-check-input" type="checkbox" name="options[]" id="inlineRadio1" value="'+option.id+'"><label class="form-check-label" for="inlineRadio1">'+option.name+'</label></h3></div><br>');
                        //$('.the_options_one').append('</div>');


                            console.log(option.options);

                        for(the_option of option.options){
                            //console.log(the_option);
                            //$('.the_options_one').append('<div class="row">');
                            $('.the_options_one').append('<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="the_other_options['+option.id+'][]" id="inlineRadio1" value="'+option.options.indexOf(the_option)+'"><label class="form-check-label" for="inlineRadio1">'+the_option+'</label></div>');
                            //$('.the_options_one').append('</div>');
                        }

                        $('.the_options_one').append('<br>');
                    }
                 })
        }


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

        $('input[name="shipping"]').click(function() {
            if($('input[name="shipping"]:checked').val() == 0) {
                $('.delivery_section').css('display', 'none');
            }else{
                $('.delivery_section').css('display', 'block');
            }
        });

    </script>


    <script>
        function openCity(evt, cityName) {
            event.preventDefault();
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName.getAttribute('id')).style.display = "block";
            evt.currentTarget.className += " active";
        }


        function openCityOne(evt, cityName) {
            event.preventDefault();
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontentone");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName.getAttribute('id')).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function openCityTwo(evt, cityName) {
            event.preventDefault();
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontenttwo");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName.getAttribute('id')).style.display = "block";
            evt.currentTarget.className += " active";
        }
        
    </script>

@endsection