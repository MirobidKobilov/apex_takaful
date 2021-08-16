@extends('layouts.frontend')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/assets/styles/css/static-page.css') }}">
@endsection

@section('content')
    <section class="static">
        <div class="bg-img">
            <h1>@lang('main.menu.contact')</h1>
            <ol>
                <li>
                    <a href="{{ route('home') }}" class="breadcrumbs__active">
                        @lang('main.menu.main')
                    </a>
                </li>
                <li>
                    <span class="breadcrumbs__active">
                        @lang('main.menu.contact')
                    </span>
                </li>
            </ol>
        </div>
    </section>

    <section class="contact_text">
        <div class="container">
            <div class="contact_text-wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact_text-item last-item">
                            <div class="d-flex justify-content-center align-items-baseline borderly">
                                <div>
                                    <img src="{{ asset('frontend/assets/images/icons/envelope-icon.svg') }}" alt="">
                                </div>
                                <div>
                                    <p>info@apextakaful.uz</p>
                                    <span>@lang('main.mail-us')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_text-item">
                            <div class="d-flex justify-content-center align-items-baseline borderly">
                                <div>
                                    <img src="{{ asset('frontend/assets/images/icons/phone-icon.svg') }}" alt="">
                                </div>
                                <div>
                                    <p>+998 (71) 203 08 08</p>
                                    <span>@lang('main.call-us')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_text-item">
                            <div class="d-flex justify-content-center align-items-baseline">
                                <div>
                                    <img src="{{ asset('frontend/assets/images/icons/adress-cyan.svg') }}" alt="">
                                </div>
                                <div>
                                    <p>@lang('main.footer.adress')</p>
                                    <span>@lang('main.find-us')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form_map">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion contact-accordion" id="accordionExample">
                        @foreach ($branches as $item)
                            <div class="accordion-item" data-lat="{{$item->lat()}}" data-long="{{$item->long()}}" data-id="{{$item->id}}">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed map-accordion_btn" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $item->id }}"
                                        aria-expanded="false" aria-controls="collapseOne{{ $item->id }}">
                                        {{ $item->title }}
                                    </button>
                                </h2>
                                <div id="collapseOne{{ $item->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>@lang('main.adress'): {{ $item->adress }}</p>
                                        <p>@lang('main.phone'): +998 (71) 203 08 08</p>
                                        <p>@lang('main.mail'): {{ $item->mail }}</p>
                                        <p><span>@lang('main.we-are')</span> <a class="map-btn">@lang('main.on-map')</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="contact-map">
                        <div id="map-wrapper">
                            <div id="map-render" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_number">
        <div class="container">
            <div class="contact_number-wrapper">
                <span>@lang('main.questions')</span>
                <div class="d-flex align-items-center">
                    <img src="{{asset('frontend/assets/images/icons/phone-icon-white.svg')}}" alt="">
                    <a href="#">1188</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    $(function(){
        $('.map-btn').on('click', function(){
            let lat = $(this).parents('.accordion-item').data('lat')
            let long = $(this).parents('.accordion-item').data('long')
            let id = $(this).parents('.accordion-item').data('id')
            let pointer = [lat, long]
            let map = document.querySelector('#map-render')
            if(map) {
                map.innerHTML = ''
            }
            ymaps.ready(function() {
                let map = new ymaps.Map("map-render", {
                    center: pointer,
                    zoom: 15
                })
                if (map) {
                    ymaps.modules.require(['Placemark', 'Circle'], function (Placemark, Circle) {
                    let placemark = new Placemark(pointer);
                    map.geoObjects.add(placemark);
                    });
                }
            });
        })
    })
</script>
@endsection
