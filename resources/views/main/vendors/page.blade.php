<!DOCTYPE html>
<html lang="ar" dir="rtl"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="facebook-domain-verification" content="pc1dyznu3atd7rw5ws0ovk4dyk96hi">
              <title>Mzareana-Seller</title>
          
        
              <link rel='stylesheet' type="text/css"  href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css' integrity='sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==' crossorigin='anonymous'/>
    
    
              <link rel="stylesheet" type="text/css" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
              
              <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />    
              <link rel="stylesheet" type="text/css" href="{{ url('main/css/main.css') }}">
              <style>@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap');</style>
              <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
              <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />   
          
               <link rel="stylesheet" type="text/css" href="{{ url('main/css/swiper.min.css') }}">   
               
               <link rel="stylesheet" href="{{ url('main/css/carousel/style.css') }}">
          
               <link rel="stylesheet" href="{{ url('main/css/kite.css') }}">
          
               <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
               
               
     <script src="https://connect.facebook.net/signals/config/517882089365417?v=2.9.44&amp;r=stable" async=""></script><script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script><script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NP8MBJJ"></script><script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
     
     
          
     
              <style>
           .rc-rcbrand-inner{
             direction: ltr;
           }
         </style>
         
         <link rel="stylesheet" type="text/css" href="https://joomlakw.com/public/main/css/me.css">
         
         
        
          
     </head>
    <body class="seller" >
        
        <div class='main_upper' > 
        
             <div class="upper-bar container mt-4">
                <div class="row">
                    <!-- One -->
                    <div class="col-md-6 col-12">
                        <ul class="list-unstyled row d-flex justify-content-center justify-content-md-start">
                            <li> <a href="/login" style="color: #000; font-weight:bold;">إنشاء حساب</a> | &nbsp;</li>
                            <li> <a href="/register" style="color: #000;font-weight:bold;">تسجيل دخول</a> | &nbsp; </li>
                            <li> <a href="/contact_us" style="color: #000; font-weight:bold;">خدمة العملاء</a> | &nbsp;</li>
                            <li> <a href="/cart" style="color: #000; font-weight:bold;">تتبع مشترياتك</a></li>
                        </ul>
                    </div>

                    <!-- Two -->
                    <div class="col-md-4 col-12">
                        <ul class="list-inline row d-flex justify-content-center justify-content-md-end">
                          <li> <a href="/" style="color: #fff; font-weight:bold;">الصفحة الرئيسية</a></li>
                        </ul>



                    </div>

                 

                </div>

            </div>
        </div>
        
        <div class='seller_details'>
            
             <a href="{{ route('the_all_vendors.show', $vendor->user_name) }}"> <h4> {{ $vendor->user_name }} </h4></a>
            <div  class='avatar'> <img src="{{ $vendor->img_path }}">  </div>
            
            <div class="status">  <a class="product-count" href="#" > {{ count($vendor->products) }} منتج </a>  <a class="status-seller" href="#"  > الطلب <span> متاح </span> </a></div>
            
            <div class="social" >
                <a href="{{ $vendor->maroof }}" class=" fac "> <img src="https://pbs.twimg.com/profile_images/717009412469207040/kWgl1aYP_400x400.jpg" width="20" height="20" alt="" srcset=""></a> 
                <a href="{{ $vendor->facebook }}" class='fac' > <i class="fab fa-facebook-f"></i> </a> 
                <a href="{{ $vendor->twitter }}" class='twt' > <i class="fab fa-twitter"></i> </a> 
                <a href="{{ $vendor->snapchat }}" class='snap' > <i class="fab fa-snapchat"></i> </a>
            </div>
            
        </div>
        
       
        
        
       @include('main.vendors.includes.page.links')

       @include('main.vendors.includes.page.products')
        
        
        
        
    <!-- Brands -->

    {{--<section class="brands container">
        <div class="row">
          <div class="rc-rcbrand-container"><div class="rc-rcbrand-inner"><ul id="rcbrand2" class="rc-rcbrand-ul" style="left: -4560px;">
              
              <li class="rc-rcbrand-item" style="width: 380px;">
                  <img src="images/logo1.png">
              </li>
              <li class="rc-rcbrand-item" style="width: 380px;">
                  <img src="images/logo2.png">
              </li>
              <li class="rc-rcbrand-item" style="width: 380px;">
                  <img src="images/logo3.png">
              </li>
               <li class="rc-rcbrand-item" style="width: 380px;">
                  <img src="images/logo4.png">
              </li>
        
        
                    
            
        
                    
            
        
                    
            
        
                    
            
        
                    </ul><div class="rc-rcbrand-nav-left"></div><div class="rc-rcbrand-nav-right"></div></div></div>
          
        </div>
      </section>
  --}}
      <!-- Brands -->

    
  



    <div class="clear" style="clear: both;"></div>


    <!-- Footer -->

    

    <!-- Footer --> <!-- Start Footer -->
    <div class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-12">
            <div class="site-info">
              <img style="width:100%;max-width:400px" src="https://mazreana2.ecit-test.com/main/img/footer.png" alt="" srcset="">
             
            </div>
          </div>
          <div class="col-md-2 col-12">
            <div class="helpful-links">
              <div class="row">
                <div class="col">
                  <ul class="list-unstyled">
                                          <li><a href="" style="color: #fff"> عن الموقع </a></li>
                                          <li><a href="" style="color: #fff"> اتصل بنا </a></li>
                                          <li><a href="" style="color: #fff"> سياسة إرجاع المنتج </a></li>
                                          <li><a href="" style="color: #fff"> نظام الشحن </a></li>
                                      </ul>
                </div>
                
              </div>
            </div>
          </div>
            <div class="col-md-2 col-12">
            <div class="helpful-links">
              <div class="row">
                <div class="col">
                  <ul class="list-unstyled">
                                          <li><a href="" style="color: #fff"> بن</a></li>
                                          <li><a href="" style="color: #fff"> عسل </a></li>
                                          <li><a href="" style="color: #fff"> خضروات وفواكه
</a></li>
                                          <li><a href="" style="color: #fff"> حبوب </a></li>
                                          <li><a href="" style="color: #fff"> التمور </a></li>
                                      </ul>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-md-2 col-12">
            <div class="col helpful-links">
             <ul class="list-unstyled">
                                  <li><a href="" style="color: #fff"> الزيت – زيت الزيتون
 </a></li>
                                  <li><a href="" style="color: #fff"> البذور والشتالت – واألسمدة والمحميات
 </a></li>
                                  <li><a href="" style="color: #fff"> الورود وتنسيق الحدائق داخلية وخارجية
 </a></li>
                                  <li><a href="" style="color: #fff"> المتاجر المتخصصة ببيع اللحوم ومنتجات المواشي
 </a></li>
                                  <li><a href="" style="color: #fff"> متاجر أغذية ومعدات المواشي 
 </a></li>
                              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- End Copyright -->



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://joomlakw.com/public/main/js/swiper.min.js"></script>

    <script src="https://joomlakw.com/public/main/js/main.js"></script>
    
    
    <script src="https://joomlakw.com/public/main/js/carousel/jquery.rcbrand.js"></script>
    
    
    <script>
        

      $(window).load(function() {
      
      $("#rcbrand1").rcbrand({
          visibleItems: 4,
          itemsToScroll: 3,
          animationSpeed: 200,
          infinite: true,
          navigationTargetSelector: null,
          autoPlay: {
              enable: false,
              interval: 5000,
              pauseOnHover: true
          },
          responsiveBreakpoints: {
              portrait: {
                  changePoint:480,
                  visibleItems: 1,
                  itemsToScroll: 1
              },
              landscape: {
                  changePoint:640,
                  visibleItems: 2,
                  itemsToScroll: 2
              },
              tablet: {
                  changePoint:768,
                  visibleItems: 3,
                  itemsToScroll: 3
              }
          }
      });
      
      $("#rcbrand2").rcbrand({
          visibleItems: 3,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 3000,
              pauseOnHover: true
          }
      });
      
      $("#rcbrand3").rcbrand({
          infinite: false
      });
      
      });
      </script>
      
      <script>
      try {
      fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
      return true;
      }).catch(function(e) {
      var carbonScript = document.createElement("script");
      carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
      carbonScript.id = "_carbonads_js";
      document.getElementById("carbon-block").appendChild(carbonScript);
      });
      } catch (error) {
      console.log(error);
      }
      </script>
      <script type="text/javascript">
      
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);
      
      (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
      
          </script>
    
      <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NP8MBJJ');</script>
    <!-- End Google Tag Manager -->

    
<div style="display: none; visibility: hidden;">
<script>!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","517882089365417");fbq("track","PageView");</script>
<noscript></noscript>
</div>
<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","517882089365417");fbq("set","agent","tmgoogletagmanager","517882089365417");fbq("track","PageView");</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=517882089365417&amp;ev=PageView&amp;noscript=1"></noscript>
</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>