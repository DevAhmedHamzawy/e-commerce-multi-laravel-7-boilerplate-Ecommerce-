@extends('main.layouts.app')

@section('header')
<link rel="stylesheet" href="{{ url('main/css/nicepage.css') }}" media="screen">
<link rel="stylesheet" href="{{ url('main/css/About.css') }}" media="screen">
@endsection

@section('content')
    @include('main.welcome.banners')
    

    
    
    {{--@include('main.welcome.best_ads')
    @include('main.welcome.new_ads')
    @include('main.welcome.ads_by_category')--}}



@endsection