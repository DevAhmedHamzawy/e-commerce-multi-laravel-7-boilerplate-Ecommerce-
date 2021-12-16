@extends('main.layouts.app')

@section('content')


    <div class="bread">
        @foreach ($category->subcategories as $subcategory)<span><a href="{{ route('all_products.index', $subcategory->slug) }}" style="color: #9d0909; font-weight: bold;">{{ $subcategory->name }}</a></span>@endforeach
    </div>

    {{-- @if($category->show == 'tabs')  @include('main.products.includes.by_tabs')  @endif --}}

    {{-- @if($category->show == 'blocks')  @include('main.products.includes.by_blocks') @endif --}}

    @include('main.products.includes.by_blocks')

@endsection