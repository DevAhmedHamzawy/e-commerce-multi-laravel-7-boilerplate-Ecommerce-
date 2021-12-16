@extends('admin.layouts.app')

@section('content')


<div class="container-fluid">

  <div class="row">
    <div class="col-md-9"></div>

    <div class="col-md-3">
      <div class="mt-5" style="float: left;margin-left: 20%;">
      <div class="btn btn-success">
        <i class="fa fa-question-circle-o" aria-hidden="true"></i> &nbsp; مساعدة ؟</div>
      </div>
    </div>
  </div>
 


  <div class="row">
    <div class="col-md-7 my-4 ml-md-5">
      <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
      
      <div class="row" style="font-weight: bold;font-size: 0.8em;">
        <i class="fa fa-cog mt-1 ml-4" aria-hidden="true"></i>
        <div class="text-left" style="margin-right: 5px;">إعداد المتجر لأول مرة</div>
      </div>
      
      <br>

      <div class="row">
        <div class="col-md-3">
          <h5 class="text-center">
            <img src="{{ url('/admin/panel/img/vegetables.jpg') }}" width="60%" alt="" srcset="">
          </h5>
        
          <h6 class="text-center text-black">
            <a href="{{ route('v_products.index') }}"> إضافة المنتجات </a>
          </h6>

          <p class="text-center" style="color: #B2BEC3; font-size: 0.74em;">قم يإضافة المنتجات لكى تكون جاهزة للبيع فى المتجر</p>


          <div class="text-center" style="font-size: 1.5em;color: #1ABC9C;">
            @if(count(auth()->user()->products) > 0)
            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            @else
            <div class="text-center">
              <div class="btn btn-danger">
                <a href="{{ route('v_products.create') }}" style="list-style-type: none;color:white;">
                + إضافة منتج جديد
                </a>
              </div>
            </div>  
            @endif
          </div>
          

        </div>
        <div class="col-md-3">

          <div class="text-center">
            <img src="{{ url('/admin/panel/img/shipping.png') }}" width="60%" alt="" srcset="">
          </div>
          
          <div class="text-center">خيارات الشحن</div>

          <p class="text-center" style="color: #B2BEC3; font-size: 0.74em;">قم بالربط مع شركات الشحن بكل سهولة</p>

          <div class="text-center" style="font-size: 1.5em;color: #1ABC9C;">
            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
          </div>

        </div>
        <div class="col-md-3">
          
          <div class="text-center">
            <img src="{{ url('/admin/panel/img/wallet.png') }}" style="margin-top: 10%;" width="50%" alt="" srcset="">
          </div>
          
          <div class="text-center">طرق الدفع</div>

          <p class="text-center" style="color: #B2BEC3; font-size: 0.74em;">فعل وسائل الدفع التى تقوم بتوفيرها لعملائك</p>

          <div class="text-center">
            <div class="btn btn-danger">تفعيل طرق الدفع</div>
          </div>  

        </div>
        <div class="col-md-3">
          
          <div class="text-center">
            <img src="{{ url('/admin/panel/img/store.png') }}" style="margin-top: 10%;" width="50%" alt="" srcset="">
          </div>
          
          <div class="text-center">إعداد المتجر</div>

          <p class="text-center" style="color: #B2BEC3; font-size: 0.74em;">قم بإعداد متجرك من خلال بعض الخطوات البسيطة</p>

          <div class="btn btn-danger">
            <a href="{{ route('v_settings.edit', auth()->user()->user_name) }}" style="list-style-type: none;color:white;">إعدادات المتجر</a>
          </div>

        </div>
      </div>
     

      </div>
    
    </div>

    <div class="col-md-4 my-4">
      <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
          <div class="row" style="font-weight: bold;font-size: 0.9em;">
            <i class="fa fa-bell-o mt-1 ml-4" aria-hidden="true" style="font-weight: bold"></i>
            <div class="text-left" style="margin-right: 5px;">التنبيهات</div>
          </div>


          <div class="card border-0">
            <div class="row ">
              <div class="col-md-3">
                  <img src="https://img.icons8.com/bubbles/452/user.png" class="rounded-circle" style="width: 70%; height: 60%;margin-top: 20%;">
                </div>
                <div class="col-md-6 px-3">
                  <div class="card-block px-3 my-3">
                    <h6 class="card-title" style="font-size: 0.6em;font-weight: bold;">زائر قام بشراء منتج</h6>
                    <h6 style="font-size: 0.6em;">منذ اسبوع</h6>
                  </div>
                </div>
                <div class="col-md-3">
                  <img src="https://images.pexels.com/photos/589802/pexels-photo-589802.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" style="width: 100%;" class="my-3">
                </div>
              </div>
          </div>

      </div>

      <div class="bg-mattBlackLight dashboard-card p-3 mt-4" style="border-radius:8px;">
        <div class="row" style="font-weight: bold;font-size: 0.9em;">
          <i class="fa fa-exclamation-triangle mt-1 ml-4" aria-hidden="true"></i>
          <div class="text-left" style="margin-right: 5px;">منتجات نفذت</div>
        </div>
        @php $product = \App\Product::inRandomOrder()->first(); @endphp
        <div class="card border-0">
          <div class="row ">
            <div class="col-md-4">
                <img src="{{ $product->img_path }}" class="rounded-circle" style="width: 70%; height: 100%;">
              </div>
              <div class="col-md-8 px-3">
                <div class="card-block px-3">
                  <h6 class="card-title">
                    <a href="{{ route('all_products.show', $product->slug) }}" target="_blank">
                      {{  $product->name  }}
                    </a>
                  </h6>
                  <h6>{{ $product->price }}</h6>
                </div>
              </div>
            </div>
        </div>
        

      </div>

    </div>


    <div class="col-md-7 ml-md-5" style="margin-top: -2em;">

      <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
        <div class="row" style="font-weight: bold;font-size: 0.9em;">
          <div class="col-md-3 text-left" style="margin-right: 10px;">ملخص الشهر</div>
          <h6 class="col-md-3 text-right">
            @php Carbon\Carbon::setlocale("ar"); @endphp
            {{ Carbon\Carbon::now()->format('F Y')  }}
          </h6>
        </div>

        <div class="row">

          <div class="col-md-6">

            <div class="row">

            <div class="col-md-6">
              <div class="card border-0">
                <div class="row ">
                  <div class="col-md-6">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                    </span> 
                    </div>
                    <div class="col-md-6">
                      <div class="card-block">
                        <div class="card-title">____</div>
                        <h6 class="card-title" style="font-size: 0.8em !important;font-weight: bold !important;">الزيارات</h6>
                      </div>
                    </div>
                  
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card border-0">
                <div class="row ">
                  <div class="col-md-6">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                    </span> 
                    </div>
                    <div class="col-md-6">
                      <div class="card-block">
                        <div class="card-title">{{ $orderCount }}</div>
                        <h6 class="card-title"  style="font-size: 0.75em !important;font-weight: bold !important;">المبيعات</h6>
                      </div>
                    </div>
                  
                  </div>
              </div>
            </div>

            </div>

            <div class="row">


            <div class="col-md-6">
              <div class="card border-0">
                <div class="row ">
                  <div class="col-md-6">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-first-order fa-stack-1x fa-inverse"></i>
                    </span> 
                    </div>
                    <div class="col-md-6">
                      <div class="card-block">
                        <div class="card-title">{{ $orderCount }}</div>
                        <h6 class="card-title"  style="font-size: 0.8em !important;font-weight: bold !important;">الطلبات</h6>
                      </div>
                    </div>
                  
                  </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="card border-0">
                <div class="row ">
                  <div class="col-md-6">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-trophy fa-stack-1x fa-inverse"></i>
                    </span>                     
                  </div>
                    <div class="col-md-6">
                      <div class="card-block">
                        <div class="card-title">____</div>
                        <h6 class="card-title"  style="font-size: 0.7em !important;font-weight: bolder !important;">هدف الشهر ></h6>
                      </div>
                    </div>
                  
                  </div>
              </div>
            </div>

            </div>

          </div>

            

       
       
  
          <div class="col-md-6" style="background-color: #dfe6e9;margin-top: -2.7em;">
            <div style="height: 90%;margin-top: 10%;">{!! $postsByMonthChartTwo->container() !!}</div>
          </div>
        </div>
       


      </div>


    </div>

  </div>

</div>

















{{--<div class="row" style="margin-top: 60px; margin-right: 15px;">
  <div class="col-md-6">
  
      <div class="circle-tile">
        <a href="#">
            <div class="circle-tile-heading green">
                <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
            </div>
        </a>
        <div class="circle-tile-content green">
            <div class="circle-tile-description text-faded">
                الطلبات
            </div>
            <div class="circle-tile-number text-faded">
               0
            </div>
            <a href="{{ route('v_orders.index') }}" class="circle-tile-footer">عرض التفاصيل <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
      
      </div>
      
  
  
  
  <div class="col-md-6 ">
  
    <div class="circle-tile">
      <a href="#">
          <div class="circle-tile-heading dark-blue">
              <i class="fa fa-database fa-fw fa-3x"></i>
          </div>
      </a>
      <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">
              المنتجات
          </div>
          <div class="circle-tile-number text-faded">
            {{ $productCount }} 
          </div>
          <a href="{{ route('v_products.index') }}" class="circle-tile-footer">عرض التفاصيل <i class="fa fa-chevron-circle-right"></i></a>
      </div>
    </div>
    
    </div>
    
</div>  
  
    
    <div class="row" style="margin-right: 15px;">
  
      <div class="col-md-6 my-3">
  
        <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
          <h3 class="mb-2 text-center">  الإعلانات حسب أقسام المنتجات</h3>
          <div>{!! $countCategoryChart->container() !!}</div>
        </div>
  
  
      
      
      </div>
  
  
      <div class="col-md-6 my-3">
  
        <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
          <h3 class="mb-2 text-center"> إحصائيات الطلبات لسنة  {{ date("Y") }}</h3>
          <div>{!! $OrdersInYearChart->container() !!}</div>
        </div>
  
        <div class="bg-mattBlackLight dashboard-card p-3" style="margin-top: 10px; border-radius:8px;">
          <h3 class="mb-2 text-center">  إحصائيات المنتجات لسنة {{ date("Y") }}</h3>
          <div>{!! $ProductsInYearChart->container() !!}</div>
        </div>
  
      </div>
  
    </div>



   
    
    <div class="row" style="margin-right: 15px;">
      <div class="col-md-6 my-3">
        <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
    
          <h3 class="mb-2 text-center">   المنتجات الأكثر مبيعا  </h3>
    
          <table class="table table-striped" style="width: 95%;margin: 3%;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">الإسم</th>
                <th scope="col">عرض</th>
              </tr>
            </thead>
            @foreach ($users as $user)
              <tbody>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td><a href="{{ route("users.show", [$user->name]) }}" class="edit btn btn-primary btn-sm">عرض</a></td>
              </tbody>
            @endforeach
          </table>
    
        </div>
      </div>
      <div class="col-md-6 my-3">
        <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
    
          <h3 class="mb-2 text-center">   المستخدمين الاكثر طلبا  </h3>
    
          <table class="table table-striped" style="width: 95%;margin: 3%;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">الإسم</th>
                <th scope="col">عرض</th>
              </tr>
            </thead>
            @foreach ($users as $user)
              <tbody>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td><a href="{{ route("users.show", [$user->name]) }}" class="edit btn btn-primary btn-sm">عرض</a></td>
              </tbody>
            @endforeach
          </table>
    
        </div>
      </div>
    </div>
    
      <div class="row" style="margin-right: 15px;">
        <div class="col-md-6 my-3">
          <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
      
            <h3 class="mb-2 text-center">   المنتجات الجديدة  </h3>
    
            <table class="table table-striped" style="width: 95%;margin: 3%;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">الإسم</th>
                  <th scope="col">عرض</th>
                </tr>
              </thead>
              @foreach ($users as $user)
                <tbody>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td><a href="{{ route("users.show", [$user->name]) }}" class="edit btn btn-primary btn-sm">عرض</a></td>
                </tbody>
              @endforeach
            </table>
      
          </div>
        </div>
        <div class="col-md-6 my-3">
          <div class="bg-mattBlackLight dashboard-card p-3" style="border-radius:8px;">
      
            <h3 class="mb-2 text-center">   الطلبات الجديدة  </h3>
    
            <table class="table table-striped" style="width: 95%;margin: 3%;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">الإسم</th>
                  <th scope="col">عرض</th>
                </tr>
              </thead>
              @foreach ($users as $user)
                <tbody>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td><a href="{{ route("users.show", [$user->name]) }}" class="edit btn btn-primary btn-sm">عرض</a></td>
                </tbody>
              @endforeach
            </table>
      
          </div>
        </div>
     
      </div>
    
    </div>

    --}}
    
    @endsection
    
    @section('footer')
    
    
    {{--
    {!! $OrdersInYearChart->script() !!}
    {!! $countCategoryChart->script() !!}
    {!! $ProductsInYearChart->script() !!}
    --}}

    {!! $postsByMonthChartTwo->script() !!}

    @endsection