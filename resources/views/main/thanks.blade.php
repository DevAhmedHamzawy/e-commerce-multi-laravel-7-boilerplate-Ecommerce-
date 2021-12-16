@extends('main.layouts.app')

@section('content')


    <h1 class="text-center">
        تــــم إنـــشــــاء مـــتـــجـــرك الـــخـــاص {{  $admin->user_name  }}
    </h1>


    <h3 class="text-center">
        يمكنك الدخول لمتجرك الخاص :- 
        

        <a href="https://mazreana2.ecit-test.com/admin/login" class="btn btn-success">مــــــن هـــــنـــا</a>
        
    </h3>
  
@endsection