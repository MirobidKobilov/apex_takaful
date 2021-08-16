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
                <span class="breadcrumbs__active">
                    {{Request::is('general-products') ? trans('main.menu.general') : trans('main.menu.family')}}
                </span>
            </li>
        </ol>
    </div>
</section>
<section class="awards">
    <div class="container">
        <section class="news">
            <div class="news-wrapper no-bg">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-4">
                        <div class="news_item-wrapper">
                            <a href="{{route('products.show', ['id' => $product->id])}}">
                                <div class="news_item">
                                    <img src="{{asset('storage/'.$product->img)}}" alt="">
                                    <div class="news-text">
                                        <h4>{{$product->title}}</h4>
                                        <p>{{$product->short_text}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container">
                <div class="contact-btn">
                    <p><strong>@lang('main.cont')</strong> @lang('main.cont-answer')</p>
                    <a href="{{route('contact')}}">@lang('main.cont-btn')</a>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection

@section('script')
    
@endsection