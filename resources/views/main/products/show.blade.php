@extends('main.layouts.app')


@section('meta')

<meta name='description' itemprop='description' content='{{ $product->description }}' />
<meta property='article:published_time' content='{{ $product->updated_at }}' />
<meta property='article:section' content='{{ $category->name }}' />

<meta property="og:description"content="{{ $product->description }}" />
<meta property="og:title"content="{{ $product->name }}" />
<meta property="og:url"content="{{ url()->current() }}" />
<meta property="og:type"content="product" />
<meta property="og:locale"content="ar" />
<meta property="og:site_name"content="{{ $settings->name }}" />
<meta property="og:image"content="{{ $product->img_path }}" />
<meta property="og:image:url"content="{{ $product->img_path }}" />
<meta property="og:image:size"content="300" />

<meta property="og:title" content="{{ $product->name }}">
<meta property="og:description" content="{{ $product->description }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $product->img_path }}">
<meta property="product:brand" content="{{ $settings->name }}">
<meta property="product:availability" content="in stock">

@foreach ($options as $suboptions)
    @foreach ($suboptions as $option)
        <meta property="product:condition" content="{{ $suboptions[0]['name'] }} &nbsp; {{ $option['value'] }}">
    @endforeach
@endforeach

<meta property="product:price:amount" content="{{ $product->price }}">
<meta property="product:price:currency" content="{{ $settings->currency }}">
<meta property="product:retailer_item_id" content="{{ $product->code }}">
<meta property="product:item_group_id" content="{{ $category->name }}">


<meta name="twitter:card" content="{{ $product->name }}" />
<meta name="twitter:site" content="@mazarana" />
<meta name="twitter:creator" content="@mazarana" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ $product->name }}" />
<meta property="og:description" content="{{ $product->description }}" />
<meta property="og:image" content="{{ $product->img_path }}" />
@endsection


@section('header')

<link rel="stylesheet" href="{{ asset('main/css/pop-up/style.css') }}">

    <style>
        .next {
            left: 0 !important;
            right: 100%;
            border-radius: 3px 0 0 3px;
         }
    </style>

    <style>
        .next {
            right: 100%;
            border-radius: 3px 0 0 3px;
        }
    </style>

@endsection

@section('content')
    
<!-- ========================== start product =========================== -->
<div class="container-fluid">
    <div class="bread d-none d-md-block">
        <a href="{{ route('all_products.index', $mainCategory->slug) }}"><span>{{ $mainCategory->name }}</span></a><i class="fas fa-chevron-left"></i>
        <a href="{{ route('all_products.index', $category->slug) }}"><span>{{ $category->name }}</span></a><i class="fas fa-chevron-left"></i>
        <a href="{{ route('all_products.show', $product->slug) }}"><span>{{ $product->name }}</span></a>
    </div>
        <div class="row">

            <div class="col-md-3">

             @include('main.products.includes.gallery')

            </div>


            <div class="col-md-5">

                <ul class="dattaa mt-3">
                    <li><h3> كود المنتج :- {{ $product->code }}</h3></li>
                    <li><h3> {{ $product->name }} </h3></li>
                </ul>

          
                
                <ul class="dattaa mt-3">
                    @if ($product->user != null)
                    <li><i class="fas fa-store"></i> <a href="{{ route('the_all_vendors.show', $product->user->user_name) }}" style="color: #58C034 !important;">{{ $product->user->user_name }}</a> </li>

                    @else
                    <li><i class="fas fa-store"></i> <a href="{{ route('contact_us') }}" style="color: #58C034 !important;">منصة مزارعنا</a> </li>
                    @endif
                </ul>



              <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="float: right; margin-right: 10px;">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_facebook_messenger"></a>
                <a class="a2a_button_telegram"></a>
                <a class="a2a_button_pinterest"></a>
                <a class="a2a_button_google_gmail"></a>
                <a class="a2a_button_reddit"></a>
            </div>
            <script>
                var a2a_config = a2a_config || {};
                a2a_config.locale = "ar";
            </script>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
            <!-- AddToAny END -->


                @if ($product->meta_description !== null)
                <br><br><br><br>
                <ul class="fdsa"><p class="row"> {!! $product->meta_description !!} </p></ul>
                @endif
               
                <br><br>
                <ul class="fdsa"><p class="row"> {{ trans('products.description') }} : </p> {!! $product->description !!}</ul>


        

                @unless ($options == NULL)
                
                <ul class="fdsa">
                    <p class="row">{{ trans('products.options') }}</p>

                    <div class="bread">
                        @foreach ($options as $suboptions)
                        <div class="row mt-3">
                        <h6 class="font-weight-bold pt-2 pr-1">{{ $suboptions[0]['name'] }}</h6>
                        <br>
                        @foreach ($suboptions as $option)
                            <span class="option"><a href="#" id="{{ rand(0,9999) }}" onclick="selectOption({{ json_encode($suboptions[0]['name']) }}, this);return false;" style="color: #9d0909; font-weight: bold;">{{ $option['value'] }}</a></span>
                        @endforeach
                        </div>
                        @endforeach
                    </div>
                </ul>
              

                @endunless

            </div>


            <div class="col-md-2 lefttryp">
                @if ($product->the_discount)
                <div class="row">
                    <p>سعر المنتج :-{{ $product->the_price }}</p>
                    <p class="mt-2">السعر بعد الخصم :- {{ $product->the_discount }}</p>
                </div>
                @else
                <p></p><br>
                <p>سعر المنتج :-{{ $product->the_price }}</p>
                @endif
                {{--<p>{{ trans('products.prices_including_vat') }} <a href="{{ route('the_page', 5) }}" class="details"> {{ trans('products.details') }}</a>
                {{ trans('products.shipping_free') }} <a href="{{ route('the_page', 7) }}" class="details"> {{ trans('products.details') }}</a>
                </p>--}}

                <div style="margin-right: -22px;" class="col-sm-center">

                @if ($product->qty == 0)
                    هذا المنتج غير متوفر
                @else
                    <div>
                        <h4>الكمية المتوفرة :- {{ $product->qty }}</h4>
                        <form method="GET" action="{{ route('cart.store', $product->slug) }}" class="buynow">
                            <input type="hidden" id="the_main_options" name="main_options">
                            <input type="hidden" id="the_options" name="options">
                            <button type="submit" class="btn text-white" style="width: 150px;">{{trans('products.add_to_cart') }}</button> 
                        </form>
                    </div>


                    <div>
                        <form method="GET" action="{{ route('cart.store', $product->slug) }}" class="buynow">
                            <input type="hidden" id="type" name="type" value="buy_now">
                            <input type="hidden" id="the_main_options" name="main_options">
                            <input type="hidden" id="the_options" name="options">
                            <button type="submit" class="btn text-white" style="width: 150px;">{{trans('products.buy_now') }}</button> 
                        </form>
                    </div>
                    
                @endif    
                

              

                <div>
                    <form method="POST" action="{{ route('favourite') }}" class="buynow">
                        @csrf
                        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn text-white" style="width: 150px;">{{ $product->favourite ? trans('products.unfavourite')  :  trans('products.favourite') }}</button> 
                    </form>
                </div>

                </div>

                {{--<div class="lastp">
                        اشحن الى..............(تغيير المدينة)
                        ََ! اطلب قبل الساعة ٦
                        للحصول عليه غدا
                        ً مساء إختر التوصيل في اليوم التالي على
                        صفحة الشراء
                </div>--}}
            </div>
         
            
        </div>

        <br><br><br><br>

        <h3 class="text-center mb-1">تقييم المنتج</h3>

        <div class="row m-4">
            
            {!! $product->ratings->avg('rating') ?? 0 !!}&nbsp; 
            @for ($i=1; $i <= 5 ; $i++)<i class="{{ ($i <= round($product->ratings->avg('rating'),1)) ? 'fas' : 'far'}} fa-star">
            </i>
            @endfor&nbsp;&nbsp;{!! $product->ratings->count() !!}&nbsp;{{ trans('products.rated') }}</p>

        </div>

        <br><br><br><br>

        <h3 class="text-center mb-1">{{ trans('products.add_rating') }}</h3>
      
        <form class="row form-horizontal poststars m-1" action="{{ route('ratingStar') }}" id="addStar" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <div class="form-group required mt-5">
                    <div class="col-sm-12">
                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                      <label class="star star-5" for="star-5"></label>
                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                      <label class="star star-4" for="star-4"></label>
                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                      <label class="star star-3" for="star-3"></label>
                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                      <label class="star star-2" for="star-2"></label>
                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                      <label class="star star-1" for="star-1"></label>
                     </div>
                  </div>

                  
                  
                  <div class="row">
                    <div class="form-group col-md-12 required">
                        <textarea name="comment" id="comment" class="form-control" cols="140" rows="10" placeholder="إضافة تعليق ...."></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group col-md-12">
                    <button class="btn btn-primary col-md-12" type="submit">{{ trans('products.confirm') }}</button>
                  </div>
                  
        </form>

        <br><br>

        <section class="brands container">
            <div class="row">
              <ul id="rcbrand1">

        @foreach ($product->ratings as $rating)
            <li>
                <label for="user_name">{{ $rating->user->name ?? 'مستخدم' }}</label>
           
                @for($i=1; $i <= 5 ; $i++)
                    <i class="{{ ($i <= round($rating->avg('rating'),1)) ? 'fas' : 'far'}} fa-star"></i>
                @endfor
                <label for="user_comment">{!! $rating->comment !!}</label>
            </li>
           
        @endforeach

              </ul>
            </div>
        </section>


 
         <!-- ===================================== other products ====================== -->
 
 
        {{-- <divclass="title"><h4><span>trans('products.similar_products') </span></h4></div> --}}
        
     
    </div>
 
 </div>

  {{--
  @include('main.products.includes.similar_products') 
  --}}
 
 
 <!-- ============================ end product ============================ -->


 @endsection


 @section('footer')
    <script>
        var main_options = [];
        var options = [];
        function selectOption(main, item)
        {
            $('#'+$(item).attr('id')).css('color', '#fff').css('background-color', '#9d0909');

            options.push($(item).text());

            main_options.push(main);

            $("#the_options").val(options); 

            $("#the_main_options").val(main_options);
        }
    </script>


    <script src="{{ asset('main/js/pop-up/slideshow.js') }}"></script>

 @endsection