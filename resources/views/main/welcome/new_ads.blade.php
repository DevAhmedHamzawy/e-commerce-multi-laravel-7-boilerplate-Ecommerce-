<section class="labtop" style="
  background: url('{{ asset('main/img/bg_mid.jpg') }}');
    padding: 4% 0%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 3% 0;
    transform: rotate(180deg);
  ">
  

    <div class="container">
        <div class="row">

            <div class="col-md-6" style="    transform: rotate(180deg);">
                <!-- Swiper -->
                <div class="swiper-container swipermm swiper-container-horizontal swiper-container-rtl">
                    <p class="adf">الاضافة الاحدث</p>
                    <div class="swiper-wrapper">



                        @foreach ($products as $product)


                        <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-left: 30px;">
                                <div class="small_ata_home">
                                    <h4><a href="{{ route('all_products.show', $product->slug) }}" style="text-decoration: none;color: #D70204;">{{ $product->name }}</a></h4>
                                    <a href="{{ route('all_products.show', $product->slug) }}">
                                        <div class="img_product_small">
                                            <img src="{{ $product->img_path }}" class="img-fluid">
                                        </div>
                                    </a>
            
                                    @if ($product->qty == 0)
                                    @else
                                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                                    @endif
                                    
                                    <span>{{ $product->the_price }} </span>
                                </div>
                        </div>
                     

                        @endforeach                        
                        
                                                 
                                            </div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev swiper-button-disabled"></div>
                </div>
            </div>
                        <div class="col-md-6">
            </div>
        </div>
    </div>
</section>