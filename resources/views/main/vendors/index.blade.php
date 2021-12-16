@extends('main.layouts.app')

@section('header')
<link rel="stylesheet" href="{{ url('main/css/nicepage.css') }}" media="screen">
<link rel="stylesheet" href="{{ url('main/css/About.css') }}" media="screen">
@endsection

@section('content')


<div class="title">
  <h4>
     <span>
        المتاجر
     </span>
  </h4>

</div>

{{--<section class="menu_list mt-6">

    <div class="container" style="margin: auto;">
  
    
  
  
      <div class="row" style="margin-left: 6%;margin-right: 4%;">
        <div class="tab-content col-xl-12" id="myTabContent">
          
          <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
            <div class="row">


                @foreach ($vendors as $vendor)

                <div class="col-md-6 col-xl-3 col-lg-4">
                  <div class="changegrid" style="  background-color: #e1cdcd;">
                      <div>
                        <a href="" class="namename">
                          <div><img src="{{ $vendor->img_path }}" class="blocks" alt=""></div>
                        </a>
                      </div>
                      <div class="data">
                        <h4><a href="{{ route('the_all_vendors_page', $vendor->user_name) }}" class="namename">{{ $vendor->user_name }}</a></h4>
                        <div class="row">
                            <div class="col-8">
                              $vendor->description 
                            </div>
                        </div>
                      </div>
                  </div>
                </div>

                @endforeach
              
                           
                           
                          
                           
                           
            </div>
          </div>
         
          
  
        </div>
      </div>
  
    </div>
  
  </section>--}}


  <section class="u-align-center u-clearfix u-palette-5-dark-3 u-section-1" style="direction: rtl;">

    <div class="col-md-12" style="padding: 20px;">
      <div class="u-repeater u-repeater-1">

      @foreach ($vendors as $vendor)
  
        <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-1" style="height: 56%">
  
          <div class="u-container-layout u-similar-container u-container-layout-1">
  
            <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-1">
  
              <div class="u-container-layout u-container-layout-2"></div>
  
            </div>
  
            <img alt="" class="u-image u-image-default u-image-1" src="{{ $vendor->img_path }}" data-image-width="495" data-image-height="327">
  
            <div class="u-container-style u-expanded-width u-group u-group-2">
  
              <div class="u-container-layout u-container-layout-3">
  
                <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-1"> {{ $vendor->user_name }}</h3>
    
              </div>
  
            </div>
  
            <a href="{{ route('the_all_vendors_page', $vendor->user_name) }}" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-1">ذهاب إلى المتجر</a> <br><br>
  
          </div>
  
        </div>
      @endforeach
    </div>

    </div>
  </section>

  @if(\Request::route()->getName() != 'the_all_vendors.index')

  <div class="title">
    <h4>
       <span>
          المنتجات
       </span>
    </h4>
  </div>


  <div class="row" style="margin-left: 6%;margin-right: 4%;">
    <div class="tab-content col-xl-12" id="myTabContent">
      
      <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
        <div class="row">

          @foreach ($products as $product)
          <div class="col-md-6 col-xl-3 col-lg-4">
            <div class="changegrid" style="  background-color: #e1cdcd;">
              <div>
                <a href="" class="namename">
                  <div><img src="{{ $product->img_path }}" class="blocks" alt=""></div>
                </a>
              </div>
              <div class="data">
                <h4><a href="{{ route('all_products.show', $product->slug) }}" class="row namename"></h4>
                <p class="col-md-12">{{ $product->name }}</p>
                <div class="row">
                    <div class="col-12">
                        <span style="text-decoration: none !important;">{{ $product->price }} ر.س </span>
                     </div>
                    <div class="col-6 testetst">
                      <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

  </div>
  
  </div>

    </div>

  </div>

  @endif


@endsection