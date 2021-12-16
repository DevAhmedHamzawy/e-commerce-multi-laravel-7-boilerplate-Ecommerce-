<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        

        <li class="nav-item first_ite ">
          <a class="nav-link  active" href="{{ route('the_all_vendors_page', ['vendor_page' => $vendor->user_name ,'type' => 'discounts']) }}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
            التخفيضات
          </a>
        </li>



        <li class="nav-item first_ite ">
          <a class="nav-link " href="{{ route('the_all_vendors_page', ['vendor_page' => $vendor->user_name , 'type' => 'groups']) }}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
            المجموعات
          </a>
         
        </li>
                        
        
        <li class="nav-item first_ite ">
          <a class="nav-link " href="{{ route('the_all_vendors_page', ['vendor_page' => $vendor->user_name ,'type' => 'offers']) }}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
            العروض
          </a>
        </li>
        
        
        <li class="nav-item first_ite ">
          <a class="nav-link " href="{{ route('the_all_vendors_page', ['vendor_page' => $vendor->user_name ,'type' => 'distributions']) }}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
            توزيعات
          </a>
        </li>


        <li class="nav-item first_ite ">
            <a class="nav-link " href="{{ route('the_all_vendors_page', ['vendor_page' => $vendor->user_name ,'type' => 'all']) }}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
              الكل
            </a>
          </li>


        @foreach ($vendor->vendorStoreCategories as $category)
          <li class="nav-item first_ite ">
            <a class="nav-link " href="#" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
              {{ \App\Category::whereId($category->store_category_id)->first()->name }}
            </a>
          </li>
        @endforeach
     
                       
        
  
      </ul>
    
    </div>
  
  
</nav>