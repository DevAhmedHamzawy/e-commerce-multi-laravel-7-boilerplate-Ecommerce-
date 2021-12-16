@extends('admin.layouts.app')


@section('header')
    <link rel="stylesheet" href="{{ url('admin/panel/css/tab.css') }}">
@endsection

@section('content')
    {{--

    ------ Datatable Part ------   

    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h3 class="card-header">
                المنتجات 

                <div style="float:left">
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('v_products.create') }}" style="color:#fff;">إضافة منتج جديد</a>
                    </button>  
                </div>
            </h3>

            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table  data-table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الإسم</th>
                            <th scope="col">العمليات</th>
                            <th scope="col">العمليات</th>
                        </tr>
                    </thead>
                        
                </table>
            </div>
        </div>
    </div>
    </div>
    
    @section('footer')
    <script type="text/javascript">

        $(function () {
            
            var scroll_x=false;
            if($( window ).width()<=750) {
                scroll_x=true
            }
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                'scrollX': scroll_x,
                responsive: true,
                
                ajax: "{{ route('v_products.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'actionone', name: 'actionone', orderable: false, searchable: false},
                    {data: 'actiontwo', name: 'actiontwo', orderable: false, searchable: false},
                ],
                dom: 'lBfrtip',
            });
            
        });


        $.fn.dataTable.ext.errMode = 'none';

            

        </script>
    @endsection


    ------ Datatable Part ------
    
    
    --}}

    <div class="row">
        <div class="col-md-9">
            <div style="margin-top: 7%;margin-right: 15%;">
            <i class="fa fa-home"></i>
            </div>
        </div>
    
        <div class="col-md-3">
          <div class="mt-5" style="float: left;margin-left: 20%;">
          <div class="btn btn-success">
            <i class="fa fa-question-circle-o" aria-hidden="true"></i> &nbsp; مساعدة ؟</div>
          </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-9">
            <div class="btn btn-primary" style="margin-top: 4%;margin-right: 7%;">
            <a href="{{ route('v_products.create') }}" onclick="$('.the_product_new_block').css('display', 'block');return false;" style="color: #fff;"> + إضافة منتج جديد</a>
            <i class="fa fa-arrow-down"></i>
            </div>

            <button  class="deletemanybtn btn btn-danger" style="margin-top: 4%;">  حذف الإعلانات المحددة  </button>

            <button  class="btn btn-success" style="margin-top: 4%;">  
            
                <a target="_blank" href="{{ route('the_all_vendors_page', auth()->user()->user_name) }}" style="color: #fff;"> كيف يرى الاخرون متجرك ؟ </a>
            
            </button>

        </div>
    
        <div class="col-md-3">
          <div class="mt-5" style="float: left;margin-left: 20%;">
            <div class="fa fa-filter"></div>
            تصفية

            &nbsp; &nbsp;

            <i class="fa fa-suitcase"></i>
            خدمات

            &nbsp; &nbsp;


            <i class="fa fa-th-large" aria-hidden="true"></i>
            
            &nbsp;

            <i class="fa fa-list" aria-hidden="true"></i>

          </div>
        </div>
    </div>
    
    <div style="clear: both;"></div>

    <div class="container">
        <div class="row">


            <div class="col-md-4 the_product_new_block" style="display: none;">
                <div class="card">
                    <img class="card-img-top card-img-top-specific" src="{{ url('admin/panel/img/default_image.png') }}" style="width:100%" alt="Card image">
                    <div class="card-body">
                    <form action="{{ route('v_products.store') }}" method="post" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="form-group row">
                             <div class="col-md-6">
                                {{-- <span class="fa-stack fa-lg" >
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-thumb-tack fa-stack-1x fa-inverse"></i>
                                </span> --}} 
                             </div>

                             <div class="col-md-6">
                                 <div class="btn btn-success" onclick="document.getElementById('image').click()">إضافة صور جديدة</div>
                                 <input  style="display: none;"  id="image" type="file" name="main_image[]" oninvalid="alert('الرجاء رفع صورة خاصة بالمنتج لتوضيح شكل المنتج !');" accept="image/*" required multiple>
                             </div>
                        </div>
                        
                        <div class="form-group row">

                        <div class="input-group">
                            <span class="input-group-append bg-white border-right-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fas fa-boxes"></i>
                                </span>
                            </span>
                            <input type="text" name="name" placeholder="إسم المنتج" class="form-control border-left-0">
                        </div>

                        </div>

                        <div class="form-group row">

                            <div class="input-group">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </span>
                                </span>
                                <input type="text" name="price" placeholder="السعر" class="form-control border-left-0">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        ر . س
                                    </span>
                                </span>
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="input-group">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <a href="#" data-toggle="tooltip" title="يمكنك إضافة وصف مختصر للمنتج مثل :- الكيلو ، حجم العبوة ... إالخ"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                    </span>
                                </span>
                                <input type="text" name="meta_description" placeholder=" الوصف المختصر (كيلو ، نص كيلو ، ربع كيلو) " class="form-control border-left-0">
                               
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <div class="input-group">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <i class="fas fa-box"></i>
                                    </span>
                                </span>
                                <input type="text" placeholder="الكمية المتوفرة" class="form-control border-left-0">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <i class="far fa-bell"></i>
                                    </span>
                                    <span class="input-group-text bg-transparent">
                                        <i class="fas fa-infinity"></i>
                                    </span>
                                    <span class="input-group-text bg-transparent" style="font-size: 0.5em;font-weight:bold;">
                                        الخيارات والكمية
                                    </span>
                                </span>
                            </div>
                        </div>--}}

                        <div class="form-group row">
                            <div class="col-md-6 justify-content-center text-center">
                                <i class="fa fa-list"></i>
                                 <a data-toggle="modal" data-target="#myModal">بيانات المنتج </a>
                            </div>
                            <div class="col-md-6 justify-content-center text-center">
                                <i class="fa fa-arrow-down"></i>
                                المزيد 
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    إضافة
                                </button>
                            </div>
                        </div>


                        <!-- Adding Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                          
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center">بيانات المنتج</h4>
                                </div>


                                <div class="modal-body">
                                    @include('vendor.products.modal.add.data_form')
                                </div>

                              </div>
                            </div>
                        </div>


                       

                    </form>
                    </div>
                </div>
            </div>


            @foreach ($products as $product)
            <div class="col-md-4">
                <input type="checkbox" name="deletemany[]" class="deletemany" value="{{ $product->id }}" />

                <div class="card">
                    <img class="card-img-top" src="{{ $product->img_path }}" style="" alt="Card image">
                    <div class="card-body">
                    <form action="{{ route('v_products.update', $product->slug) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group row">
                             <div class="col-md-6">
                                {{-- <span class="fa-stack fa-lg" >
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-thumb-tack fa-stack-1x fa-inverse"></i>
                                </span> --}} 
                             </div>

                             <div class="col-md-6">
                                <div class="btn btn-success" onclick="document.getElementById('image_{!! $product->id !!}').click()">إضافة صور جديدة</div>
                                <input  style="display: none;"  id="image_{{ $product->id }}" type="file" name="main_image[]" accept="image/*" multiple>
                             </div>
                        </div>
                        
                        <div class="form-group row">

                        <div class="input-group">
                            <span class="input-group-append bg-white border-right-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fas fa-boxes"></i>
                                </span>
                            </span>
                            <input type="text" name="name" value="{{ $product->name }}" placeholder="إسم المنتج" class="form-control border-left-0">
                        </div>

                        </div>

                        <div class="form-group row">

                            <div class="input-group">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </span>
                                </span>
                                <input type="text" name="price" value="{{ $product->price }}" placeholder="السعر" class="form-control border-left-0">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        ر . س
                                    </span>
                                </span>
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="input-group">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <a href="#" data-toggle="tooltip" title="يمكنك إضافة وصف مختصر للمنتج مثل :- الكيلو ، حجم العبوة ... إالخ"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                    </span>
                                </span>
                                <input type="text" name="meta_description" placeholder=" الوصف المختصر (كيلو ، نص كيلو ، ربع كيلو) " value="{{ $product->meta_description }}" class="form-control border-left-0">
                               
                            </div>
                        </div>


                       
                      

                        {{--<div class="form-group row">
                            <div class="input-group">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <i class="fas fa-box"></i>
                                    </span>
                                </span>
                                <input type="text" placeholder="الكمية المتوفرة" class="form-control border-left-0">
                                <span class="input-group-append bg-white border-right-0">
                                    <span class="input-group-text bg-transparent">
                                        <i class="far fa-bell"></i>
                                    </span>
                                    <span class="input-group-text bg-transparent">
                                        <i class="fas fa-infinity"></i>
                                    </span>
                                    <span class="input-group-text bg-transparent" style="font-size: 0.5em;font-weight:bold;">
                                        الخيارات والكمية
                                    </span>
                                </span>
                            </div>
                        </div>--}}

                        <div class="form-group row">
                            <div class="col-md-6 justify-content-center text-center">
                                <i class="fa fa-list"></i>

                                @php
                                    $theCategory = \App\Category::where('id', $product->category_id)->first()->category_id;
                                @endphp

                                <a data-toggle="modal" onclick="getSubCategories({!! $theCategory !!})" data-target="#myModal_{{ $product->id }}">بيانات المنتج </a>

                                
                                <!-- Editing Modal -->
                                @php $v_product = $product; @endphp
                                <div id="myModal_{{ $product->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title text-center">بيانات المنتج</h4>
                                        </div>


                                        <div class="modal-body">
                                            @include('vendor.products.modal.edit.data_form')
                                        </div>

                                    </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 justify-content-center text-center">
                                <i class="fa fa-arrow-down"></i>
                                المزيد 
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
            @endforeach
        </div>
    </div>
   
 
    

@endsection


@section('footer')
    
    <script>
        
        function getSubCategories(item){

            if(!item.length > 0) { 
                var item = {};
                item.value = '{!! $theCategory ?? 0 !!}';

             }

            axios.get('../../list_subcategories/'+item.value)
                .then((data) => {
                $('.category_id').empty();
                $('.category_id').append('<option value="">اختر القسم ...</option>');
                for(subcategory of data.data){
                $('.category_id').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
                }  
            })
        }

        $('.category_id').on("change", function() {
            getOptions(this);
        });


        function getOptions(item){
            axios.get('../../list_options/'+item.value)
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
                $('.card-img-top-specific').attr('src', e.target.result);
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


    var checked = []
    $(document).on('click','.deletemany',function () 
    {

        checked.push(parseInt($(this).val()));        
       
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".deletemanybtn").click(function(){

        var result = confirm("Want to delete?");
        if(!result) { return ; }

        $.ajax({
            /* the route pointing to the post function */
            url: 'v_products/deletemany',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, checked:[checked]},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                $(".alert-success h4").append(data.msg); 
                window.location.reload(true);

            }
        }); 
    });
    
</script>

@endsection