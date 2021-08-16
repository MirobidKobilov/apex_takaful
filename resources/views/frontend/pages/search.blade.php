@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/static-page.css')}}">
@endsection

@section('content')
<section class="static">
    <div class="bg-img">
        <h1>@lang('main.heading.search-results')</h1>
        <ol>
            <li>
                <a href="{{ route('home') }}" class="breadcrumbs__active">
                    @lang('main.menu.main')
                </a>
            </li>
            <li>
                <span class="breadcrumbs__active">
                    @lang('main.search')
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
                    @foreach ($product as $item)
                    <div class="col-lg-4">
                        <div class="news_item">
                            <img src="{{'storage/'.$item->img}}" alt="">
                            <div class="news-text">
                                <h4><a href="{{route('products.show', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                                <p>{{$item->short_text}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</section>
<section class="awards">
    <div class="container">
        <section class="news">
            <div class="news-wrapper no-bg">
                <div class="row">
                    @foreach ($article as $item)
                    <div class="col-lg-4">
                        <div class="news_item">
                            <img src="{{'storage/'.$item->img}}" alt="">
                            <div class="news-text">
                                <span>
                                    <img src="{{asset('frontend/assets/images//icons/calendar-alt-regular.svg')}}" alt="" width="16px">
                                    <p>{{$item->published_at}}</p>
                                </span>
                                <h4><a href="{{route('articles.show', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                                <p>{{$item->short_text}}</p>
                            </div>
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