<div class="shut">
    <div class="container-fluid">
  
      <div class="row">
          <div class="col-md-1">
  
          </div>

          @foreach ($similarProducts as $product)
          <div class="col-md-3 col-6">
            <div class="small_ata">
                <h4>
                  <a href="{{ route('all_products.show', $product->slug) }}" class="namename">{{ $product->name }}</a>
                </h4>
                <div style="text-align: center;"><a href="{{ route('all_products.show', $product->slug) }}" class="namename"><img src="{{ $product->img_path }}"   class="blocks" alt="">
                  </a></div>
                @if ($product->qty == 0)
                @else
                <i class="fas fa-shopping-cart the-cart-icon"></i>
                @endif
                <span>
                  {{ $product->the_price }}
                </span>
                
              </div>
              

        </div>
        
          @endforeach
        
          <div class="col-md-1">
  
          </div>
  
      </div>
  
    </div>
  
  </div>