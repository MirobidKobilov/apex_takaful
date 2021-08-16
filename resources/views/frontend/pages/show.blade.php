@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/static-page.css')}}">
@endsection

@section('content')
<section class="static">
    <div class="bg-img">
        <h1>{{$page->title}}</h1>
        <ol>
            <li>
                <a href="{{ route('home') }}" class="breadcrumbs__active">
                    @lang('main.menu.main')
                </a>
            </li>
            <li>
                <span class="breadcrumbs__active">
                    {{$page->title}}
                </span>
            </li>
        </ol>
    </div>
</section>
<section class="awards">
    <div class="container">
            <div class="static-text" style="text-align: center">
                <h2>{{$page->title}}</h2>
                <div>
                    <div style="text-align: left">
                        <p>{!! $page->text !!}</p>
                    </div>
                    @isset($page->img)
                    <img class="static-img" src="{{'/storage/'.$page->img}}" alt="" width="800px" style="border-radius: 5px; margin-top: 80px; text-align: center;">
                    @endisset
                </div>
            </div>
    </div>
</section>
@endsection

@section('script')
    
@endsection