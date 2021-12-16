

<!-- Buttons -->



<div class="row col-md-12 mt-2 mb-2 pt-2 d-flex justify-content-center"  style="border-radius: 9px; width: 98%; margin-right: 10px;">

  

  <div class="row col-md-12 d-flex justify-content-center">

    <button type="button" class="btn myButton col-md-2">المتاجر الالكترونية</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-2">الجمعيات التعاونية الزراعية</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-2">المكتبة الزراعية</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-2" style="font-size: 14px;">الدورات التدريبية والاستشارات</button>

  </div>

  

  <div class="row col-md-12 mt-3 mb-2 d-flex justify-content-center">

    <form method="get" action="{{ route('search') }}" class="search-wrap">

        @csrf

        <div class="input-group w-100"> <input type="text" name="name" class="form-control search-form" placeholder="بحث">

            <select name="category_id" class="the_categories" id="">

              <option hidden selected> {{ trans('header.all_categories') }}  <i class="fas fa-arrow-down"></i> </option>

              @foreach ($allCategories as $category)

                <option value="{{ $category->id }}">{{ $category->name }}</option>

              @endforeach

            </select>

            <div class="input-group-append"> <button class="btn search-button" type="submit"> <i class="fa fa-search"></i> </button> </div>

        </div>

    </form>

  </div>



</div>



<!-- Buttons -->





<!-- Ads -->

<section class="">

  <div class="row">

    <div class="col-md-12 col-12"><img src="{{ $settings->first_img_path }}" style="width: 100%;height: 400px;margin: 0px !important;" alt="" class="img-fluid" srcset=""></div>

  </div>

</section>

<!-- End Ads -->















<div class="row col-md-12 mt-2 mb-2 pt-2 d-flex justify-content-center the-specific-icons">





@foreach ($producersCategories as $category)



<div class="the-icon" style="width: 10%; display:inline;margin: 0 1%;">

  <a href="{{ route('all_products.index', $category->slug) }}">
    <img src="{{ $category->img_path }}" alt="Circle Image" class="rounded-circle img-fluid">
  </a>

  <p class="text-center"><a href="{{ route('all_products.index', $category->slug) }}" style="color: #000; font-weight: bolder; font-size: 10px;">{{ $category->name }}</a></p>

</div>



@endforeach



</div>





















<div class="row col-md-12">





<ul class="col-md-4" style="list-style-type: none;">

  <li style="border: 1px solid #41E377;padding: 10px;">عروض وتخفيضات الورود والشتلات والبذور </li>

  <li style="border: 1px solid #41E377;padding: 10px;">عروض وتخفيضات الخضروات والفواكه</li>

  <li style="border: 1px solid #41E377;padding: 10px;">عروض وتخفيضات الدورات التدريبية والاستشارات </li>

  <li style="border: 1px solid #41E377;padding: 10px;">عروض وتخفيضات العسل</li>

  <li style="border: 1px solid #41E377;padding: 10px;">عروض وتخفيضات البن</li>

  <li style="border: 1px solid #41E377;padding: 10px;">عروض وتخفيضات المواشي ومشتقاتها</li>

</ul>



<div class="col-md-8">

<!-- Map -->

<div id="mymap"></div>

<!-- Map -->

</div>







</div>









<div class="row col-md-12 mt-2 mb-2 pt-2 d-flex justify-content-center the-specific-icons">





@foreach ($vendorsCategories as $category)

    

<div class="the-icon" style="width: 10%; display:inline;margin: 0 1%;">

  <a href="{{ route('all_products.index', $category->slug) }}">
    <img src="{{ $category->img_path }}" alt="Circle Image" class="rounded-circle img-fluid">
  </a>

  <p class="text-center"><a href="{{ route('all_products.index', $category->slug) }}" style="color: #000; font-weight: bolder; font-size: 10px;">{{ $category->name }}</a></p>

</div>



@endforeach



</div>







<!-- Ads -->

<section class="">

  <div class="row">

    <div class="col-md-12 col-12"><img src="{{ $settings->second_img_path }}" style="width: 100%;height: 400px;margin: 0px !important;" alt="" class="img-fluid" srcset=""></div>

  </div>

</section>

<!-- End Ads -->



<br>



<!-- Buttons -->



{{--<div class="row col-md-12 mt-2" style="margin-right: 21%;">

  

  <div class="row col-md-12">

    <button type="button" class="btn myButton col-md-1">فحص التربة</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-1">حفر الأبار</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-1">اختبار المياه</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-1"  style="font-size: 13px;">تأجير المعدات</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-1"  style="font-size: 13px;">فحص المنتجات</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button type="button" class="btn myButton col-md-1"  style="font-size: 15px;">خدمات النقل</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  </div>

  

</div>--}}



<!-- Buttons -->











<section class="row u-align-center u-clearfix u-palette-5-dark-3 u-section-1" style="direction: ltr;">

  <div class="col-md-1"></div>

  <div class="col-md-10" style="padding: 20px;">

    <div class="u-repeater u-repeater-1">

      <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-1"  style="height: 56%">

        <div class="u-container-layout u-similar-container u-container-layout-1">

          <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-1">

            <div class="u-container-layout u-container-layout-2"></div>

          </div>

          <img alt="" class="u-image u-image-default u-image-1" src="{{ url('main/img/kak-perevozit-ovoshi.jpg') }}" data-image-width="495" data-image-height="327">

          <div class="u-container-style u-expanded-width u-group u-group-2">

            <div class="u-container-layout u-container-layout-3">

              <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-1"> خدمات النقل</h3>


            </div>

          </div>

          <a href="" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-1">قراءة المزيد</a> <br><br>

        </div>

      </div>

      <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-2"  style="height: 56%">

        <div class="u-container-layout u-similar-container u-container-layout-4">

          <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-3">

            <div class="u-container-layout u-container-layout-5"></div>

          </div>

          <img alt="" class="u-image u-image-default u-image-2" src="{{ url('main/img/19_2021-637641215315352435-535.jpg') }}" data-image-width="950" data-image-height="620">

          <div class="u-container-style u-expanded-width u-group u-group-4">

            <div class="u-container-layout u-container-layout-6">

              <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-3"> فحص المنتجات</h3>


            </div>

          </div>

          <a href="" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-2">قراءة المزيد</a> <br><br>

        </div>

      </div>

      <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-3"  style="height: 56%">

        <div class="u-container-layout u-similar-container u-container-layout-7">

          <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-5">

            <div class="u-container-layout u-container-layout-8"></div>

          </div>

          <img alt="" class="u-image u-image-default u-image-3" src="{{ url('main/img/4-49.jpg') }}" data-image-width="525" data-image-height="325">

          <div class="u-container-style u-expanded-width u-group u-group-6">

            <div class="u-container-layout u-container-layout-9">

              <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-5"> تأجير المعدات</h3>


            </div>

          </div>

          <a href="" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-3">قراءة المزيد</a> <br><br>

        </div>

      </div>

      <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-4"  style="height: 56%">

        <div class="u-container-layout u-similar-container u-container-layout-10">

          <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-7">

            <div class="u-container-layout u-container-layout-11"></div>

          </div>

          <img alt="" class="u-image u-image-default u-image-4" src="{{ url('main/img/download.jpg') }}" data-image-width="193" data-image-height="261">

          <div class="u-container-style u-expanded-width u-group u-group-8">

            <div class="u-container-layout u-container-layout-12">

              <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-7"> اختبار المياه</h3>


            </div>

          </div>

          <a href="" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-4">قراءة المزيد</a> <br><br>

        </div>

      </div>

      <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-5"  style="height: 56%">

        <div class="u-container-layout u-similar-container u-container-layout-13">

          <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-9">

            <div class="u-container-layout u-container-layout-14"></div>

          </div>

          <img alt="" class="u-image u-image-default u-image-5" src="{{ url('main/img/images.jpg') }}" data-image-width="265" data-image-height="190">

          <div class="u-container-style u-expanded-width u-group u-group-10">

            <div class="u-container-layout u-container-layout-15">

              <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-9"> حفر الأبار</h3>


            </div>

          </div>

          <a href="" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-5">قراءة المزيد</a> <br><br>

        </div>

      </div>

      <div class="u-container-style u-list-item u-radius-13 u-repeater-item u-shape-round u-white u-list-item-6"  style="height: 56%">

        <div class="u-container-layout u-similar-container u-container-layout-16">

          <div class="rounded-header u-align-center u-container-style u-expanded-width u-group u-palette-4-base u-shape-rectangle u-video-cover u-group-11">

            <div class="u-container-layout u-container-layout-17"></div>

          </div>

          <img alt="" class="u-image u-image-default u-image-6" src="{{ url('main/img/Topraklarin-incelenmesi-Genel-Standartlari.jpg') }}" data-image-width="700" data-image-height="471">

          <div class="u-container-style u-expanded-width u-group u-group-12">

            <div class="u-container-layout u-container-layout-18">

              <h3 class="u-align-center u-custom-font u-text u-text-grey-50 u-text-11">فحص التربة</h3>


            </div>

          </div>

          <a href="" class="u-btn u-btn-rectangle u-button-style u-palette-4-base u-btn-6">قراءة المزيد</a> <br><br>

        </div>

      </div>

    </div>

  </div>

  <div class="col-md-1"></div>

</section>







<br>



<!-- Buttons -->



<div class="row col-md-12 mt-2 the-specific-buttons">

  

  <div class="row col-md-12">

    <a href="#" class="col-md-3 text-center" style="color: green; cursor:pointer;">شركات الشحن والتوصيل</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="#" class="col-md-3 text-center" style="font-size: 15px; color: green; cursor:pointer;">شركات التعبئة والتغليف والمطابع والمستودعات</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="#" class="col-md-3 text-center" style="color: green; cursor:pointer;">شركائنا</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  </div>

  

</div>



<!-- Buttons -->



<br>



<!-- Buttons -->



{{-- <div class="row col-md-12 col-sm-12 mt-2" style="margin-right: 15px;">

  

  <div class="row col-md-12">

    <button type="button" class="btn myButton col-md-12 col-sm-12">أخبار ومعلومات</button>

  </div>

  

</div> --}}



<!-- Buttons -->



<br>