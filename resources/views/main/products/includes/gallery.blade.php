<div class="gallery">
    
    <img src="{{ $product->img_path }}" class="img-fluid putimage" alt="" data-toggle="modal" data-target="#myModal" style="cursor: pointer">

    <div class="swiper-container swiperxx swiper-container-horizontal swiper-container-rtl">
        <div class="swiper-wrapper">

            @unless ($product->other_images == null)
                @foreach ($product->other_images_path as $key=>$value)

                <div class="swiper-slide">
                    <img src="{{ $value }}" class="img-fluid takesrc" alt="">
                </div>

                @endforeach
            @endunless
          
            
        
        </div>
        <!-- Add Pagination -->
        
        @unless ($product->other_images == null)

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        @endunless
        
     

    </div>
    

     <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="slideshow-container">

            <div class="mySlides fade">

            <img src="{{ $product->img_path }}" class="img-fluid putimage" >

            </div>

            @unless ($product->other_images == null)
            @foreach ($product->other_images_path as $key=>$value)
                <div class="mySlides fade">
                <img src="{{ $value }}"  class="img-fluid putimage">
                </div>
                
            
            @endforeach
            @endunless
      
        
        @unless ($product->other_images == null)

        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

        @endunless
   
        
        </div>
        <br>
        </div>
        
        
        
      </div>
    </div>
  </div>

</div>