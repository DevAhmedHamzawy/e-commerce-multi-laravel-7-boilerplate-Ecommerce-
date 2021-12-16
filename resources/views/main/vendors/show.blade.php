@extends('main.layouts.app')

@section('content')

<div class="wrapper fadeInDown">
    <div class="container">
        <div class="solder_bg">
            <img src="{{ url('main/img/seller_bg.jpg') }}">
        </div>
    </div>
  </div>
    
    <div class="profile_seller">  
        <div class="container">
            <div class="row" >
                <div class="col-md-3">
                    <div class="avatar" > 
                        <img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" >
                    </div>
                    <div class='description'>
                        <h3> الوصف </h3>
                        {!! $vendor->dashboard !!}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8 datils " > 
                            <h3> {{ $vendor->first_name.' '.$vendor->last_name }} </h3>
                            <h6> <i class="fas fa-map-marker-alt"></i> {{ $vendor->email }}  </h6>
                            <div class='rait'>
                                <i class="fas cheked_star fa-star"></i>
                                <i class="fas cheked_star fa-star"></i>
                                <i class="fas cheked_star fa-star"></i>
                                <i class="fas cheked_star fa-star"></i>
                                <i class="fas fa-star"></i>
                                
                                (5)
                            </div>
                            <div class="table">
                                <table>
                                    <tr>
                                         <td>اسم التاجر</td>
                                         <td>{{ $vendor->user_name }}</td>
                                    </tr>
                                     <tr>
                                         <td>عدد المنتاجات</td>
                                         <td>{{ count($vendor->products) }}</td>
                                    </tr>
                                     <tr>
                                         <td>عدد المبيعات</td>
                                         <td>{{ count($vendor->orders) }}</td>
                                    </tr>
                                    
                                    <tr>
                                         <td> وقت الأنضمام</td>
                                         <td>{{ $vendor->created_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="contact" >
                                <h5> 
                                    <i class="far fa-envelope"></i> بيانات التواصل 
                                </h5>
                                <p>
                                    {{ $vendor->email }}
                                </p>
                                 <p>
                                    {{ $vendor->telephone }}
                                </p>
                            </div> 
                        </div>
                    </div>
                    
                    <section class="menu_list mt-6">

  

</section>
                </div>


                <div class="col-md-12">

                  <div class="row" style="margin-left: 6%;margin-right: 4%;">
                    <ul class="nav nav-tabs menu_tab" id="myTab" role="tablist" style="justify-content: flex-start;border-bottom: solid 2px gray;margin-top: 28px;">
                      <li class="nav-item"><a class="nav-link active show" id="breakfast-one-tab" data-toggle="tab" href="#breakfastone" role="tab" aria-selected="false">مناتاجات البائع</a></li>
                    </ul>
                  </div>


                  <div class="row" style="margin-left: 6%;margin-right: 4%;">
                    <div class="tab-content col-xl-12" id="myTabContent">
                      
                      <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
                        <div class="row">
              
                         @foreach ($vendor->products as $product)
                               
                           <div class="col-md-3  ">
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
                                            @if ($product->qty == 0)
                                            @else
                                            <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                                            @endif
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

            </div>
        </div>
    </div>

@endsection