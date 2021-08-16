@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/static-page.css')}}">
@endsection

@section('content')
<section class="static">
    <div class="bg-img">
        <h1>@lang('main.menu.gallery')</h1>
        <ol>
            <li>
                <a href="{{ route('home') }}" class="breadcrumbs__active">
                    @lang('main.menu.main')
                </a>
            </li>
            <li>
                <span class="breadcrumbs__active">
                    @lang('main.menu.gallery')
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
                    @foreach ($images as $image)
                    <div class="col-lg-4">
                        <div class="gallery_item img-hover-zoom">
                            <img src="{{'storage/'.$image->img}}" alt="">
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