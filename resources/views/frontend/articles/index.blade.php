@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/assets/styles/css/static-page.css') }}">
@endsection

@section('content')
    <section class="static">
        <div class="bg-img">
            <h1>{!! Request::is('articles') ? trans('main.menu.articles') : trans('main.menu.news') !!}</h1>
            <ol>
                <li>
                    <a href="{{ route('home') }}" class="breadcrumbs__active">
                        @lang('main.menu.main')
                    </a>
                </li>
                <li>
                    <span class="breadcrumbs__active">
                        {{ Request::is('articles') ? trans('main.menu.articles') : trans('main.menu.news') }}
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
                        @foreach ($articles as $article)
                            <div class="col-lg-4">
                                <div class="news_item-wrapper">
                                    <a href="{{ route('articles.show', ['id' => $article->id]) }}">
                                        <div class="news_item">
                                            <img src="{{ asset('storage/' . $article->img) }}" alt="">
                                            <div class="news-text">
                                                <span>
                                                    <img src="{{ asset('frontend/assets/images//icons/calendar-alt-regular.svg') }}"
                                                        alt="" width="16px">
                                                    <span>{{ $article->published_at }}</span>
                                                </span>
                                                <h4>{{ $article->title }}</h4>
                                                <p>{{ $article->short_text }}</p>
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
