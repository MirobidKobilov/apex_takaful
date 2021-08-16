@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/static-page.css')}}">
@endsection

@section('content')
<section class="static">
    <div class="bg-img">
        <h1>{!! ($article->type == 'article' ? trans('main.menu.articles') : trans('main.menu.news')) !!}</h1>
        <ol>
            <li>
                <a href="{{ route('home') }}" class="breadcrumbs__active">
                    @lang('main.menu.main')
                </a>
            </li>
            <li>
                <a href="{{ ($article->type == 'article' ? route('articles') : route('news')) }}" class="breadcrumbs__active">
                    {!! ($article->type == 'article' ? trans('main.menu.articles') : trans('main.menu.news')) !!}
                </a>
            </li>
            <li>
                <span class="breadcrumbs__active">
                    {{$article->title}}
                </span>
            </li>
        </ol>
    </div>
</section>
<section class="awards">
    <div class="container">
            <div class="static-text" style="text-align: left">
                <span class="d-flex align-items-center">
                    <img src="{{asset('frontend/assets/images//icons/calendar-alt-regular.svg')}}" alt="" width="16px">
                    <p>{{$article->published_at}}</p>
                </span>
                <h2>{{$article->title}}</h2>
                <p class="mb-4">{{ $article->short_text }}</p>
                <div class="d-flex">
                    <img src="{{'/storage/'.$article->img}}" alt="" width="40%" style="border-radius: 5px;">
                    
                    <div style="margin-left: 24px">
                        <p>{!! $article->text !!}</p>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection

@section('script')
    
@endsection