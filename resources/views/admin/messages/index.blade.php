@extends('admin.layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                       الرسائل
                  </div>

                    <div class="card-body">

                        @if(session()->has('message'))
                            <div class="alert {{session('alert') ?? 'alert-info'}}">
                                {{ session('message') }}
                            </div>
                        @endif

                  
                                <table class="table  data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">رسائل من</th>
                                            <th scope="col">إسم المنتج</th>
                                            <th scope="col">العمليات</th>
                                        </tr>
                                    </thead> 
                                </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    


@section('footer')

    <script>
        

        $(function () {
    
    var scroll_x=false;
    if($( window ).width()<=750) {
        scroll_x=true
    }
    var table = $('.data-table').DataTable({
         processing: true,
        serverSide: true,
       
        'scrollX': scroll_x,
        ajax: "{{ route('a_product_messages.index', Request::segment(3)) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_name', name: 'user_name'},
            {data: 'product.name', name: 'product.name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        dom: 'lBfrtip',
    });
    
  });


  $.fn.dataTable.ext.errMode = 'none';

    


    </script>
   
@endsection