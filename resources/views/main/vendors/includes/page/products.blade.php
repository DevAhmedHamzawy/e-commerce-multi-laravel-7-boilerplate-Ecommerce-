<section class="menu_list mt-6">

    <div class="container" style="margin: auto;">

    


      <div class="row" style="margin-left: 6%;margin-right: 4%;">
        <div class="tab-content col-xl-12" id="myTabContent">
          
          <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
            <div class="row">
                
              
              @foreach ($vendor->products as $product)
                  
            
              <div class="col-md-4 col-xl-3 col-lg-4">
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

  </section>