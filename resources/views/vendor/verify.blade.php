@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">مـــن فـــضـــلـــك قــــم بـــتــــأكـــيـــد بـــريــــدك الإلـــكـــتـــرونـــى</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           تـــم إرســـال رابـــط اخـــر إلـــى بـــريـــدك الإلــكــتـــرونى
                        </div>
                    @endif

                    مـــن فـــضـــلـــك قــــم بـــتــــأكـــيـــد بـــريــــدك الإلـــكـــتـــرونـــى
                    <br>
                    فـى حــــالـــة عـــدم الـــعـــثـــور عـــلـــى الـــبـــريـــد,
                    <br>
                    <form class="d-inline" method="POST" action="{{ route('vendor_verify_send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">انـــقـــر هـــنـــا لـــطـــلـــب تـــأكــيــد اخـــر</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection