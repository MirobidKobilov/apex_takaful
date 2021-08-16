@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/static-page.css')}}">
@endsection

@section('content')
<section class="static">
    <div class="bg-img">
        <h1>@lang('main.menu.products')</h1>
        <ol>
            <li>
                <a href="{{ route('home') }}" class="breadcrumbs__active">
                    @lang('main.menu.main')
                </a>
            </li>
            <li>
                <a href="{{$product->type == 'family' ? route('family-products') : route('general-products')}}" class="breadcrumbs__active">
                    {{$product->type == 'family' ? trans('main.menu.family') : trans('main.menu.general')}}
                </a>
            </li>
            <li>
                <span class="breadcrumbs__active">
                    {{$product->title}}
                </span>
            </li>
        </ol>
    </div>
</section>
<section class="awards">
    <div class="container">
            <div class="static-text" style="text-align: left">
                <h2>{{$product->title}}</h2>
                <p class="mb-4">{{$product->short_text}}</p>
                <div class="d-flex">
                    <img src="{{asset('/storage/'.$product->img)}}" class="product-img" alt="" width="40%" style="border-radius: 5px;">
                    <div style="margin-left: 24px">
                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection

@section('script')
    
@endsection