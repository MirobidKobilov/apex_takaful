@extends('layouts.frontend')

@section('content')
<main>
    <section class="main-slider">
        <div class="hero-slider">
            @foreach ($sliders as $slider)
            <div class="hero-slider_item"
                style="background: linear-gradient(90deg, rgb(3, 57, 83) 0%, rgba(3, 57, 83, 0.1) 70%, rgba(3, 57, 83, 0.1) 100%), url('{{'storage/'.$slider->img}}')">
                <div class="container">
                    <div class="hero-slider_content wow">
                        <h2 class="rotateInDownLeft backface">{{$slider->short_text}}</h2>
                        <h1 class="fadeInUp backface">{{$slider->title}}</h1>
                        <p class="rotateInUpRight backface">{{$slider->long_text}}</p>
                        {{-- <div class="hero-slider_content-button">
                            <a href="#"
                                class="white-btn animate__animated animate__lightSpeedInLeft animate__delay-1s">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#003478">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                                </svg>
                                GET A QUOTE
                            </a>
                            <a href="#"
                                class="outline-btn animate__animated animate__lightSpeedInRight animate__delay-1s">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                                FIND AN AGENT
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="awards">
        <div class="container">
            <div class="awards-text">
                <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.heading.feature')</h2>
                <p class="animate__fadeInRight animate__animated wow">@lang('main.description.feature')</p>
            </div>
            <div class="row">
                @foreach ($features as $item)
                <div class="col-lg-3">
                    <div class="awards-feature_item animate__animated animate__fadeInUpBig wow"
                        style="background-image: url('{{'storage/'.$item->img}}');">
                        <div class="awards-feature_item--hover">
                            <div class="awards-feature_item--content">
                                @if ($item->icon)
                                <img src="{{'storage/' .$item->icon}}" alt="">
                                @endif
                                <p>{{$item->short_text}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="policy">
        <div class="container">
            <div class="policy-wrapper">
                <div class="policy-wrapper_img">
                    <div class="policy-wrapper_img-frame">
                        <img class="animate__fadeInLeft animate__animated wow" src="{{asset('frontend/assets/images/camel2.png')}}" alt="">
                    </div>
                </div>
                <div class="policy-wrapper_text animate__fadeInRight animate__animated wow">
                    <h2>@lang('main.hadis.author')</h2>
                    <p>@lang('main.hadis.text')</p>
                    <p>@lang('main.hadis.author_2')</p>
                    <p>@lang('main.hadis.text_2')</p>
                    <p class="source">@lang('main.hadis.source')</p>
                    <div>
                        {{-- <a href="#" class="policy-wrapper_text-btn no-border no-right-padding">
                            <img src="{{asset('frontend/assets/images/icons/bell-icon.svg')}}" alt="">
                            Learn more
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sorts">
        <div class="container">
            <div class="sorts-text">
                <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.takaful')<br>@lang('main.islamic')</h2>
                <p class="animate__fadeInRight animate__animated wow">@lang('main.product-text')</p>
            </div>
            <div class="row">
                <div class="form-card">
                    <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item mx-2 animate__fadeInLeft animate__animated wow" role="presentation">
                            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                                type="button" role="tab" aria-controls="general"
                                aria-selected="false">@lang('main.menu.general')</button>
                        </li>
                        <li class="nav-item mx-4 animate__fadeInRight animate__animated wow" role="presentation">
                            <button class="nav-link" id="family-tab" data-bs-toggle="tab"
                                data-bs-target="#family" type="button" role="tab" aria-controls="family"
                                aria-selected="true">@lang('main.menu.family')</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="row">
                                @foreach ($product_gen_2 as $product)
                                @if($product->type == 'general')
                                <div class="col-lg-6">
                                    <div class="sorts-insurance animate__animated animate__fadeInUpBig wow">
                                        <h3>{{$product->title}}</h3>
                                        <div>
                                            <img src="{{'storage/' .$product->img}}" alt="" width="90">
                                            <div>
                                                <p>{{$product->short_text}}</p>
                                                <a href="{{route('products.show', ['id' => $product->id])}}">@lang('main.more')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                @foreach ($product_gen as $product)
                                                <div class="col-lg-6">
                                                    <div class="sorts-insurance">
                                                        <h3>{{$product->title}}</h3>
                                                        <div>
                                                            <img src="{{'storage/' .$product->img}}" alt="" width="90">
                                                            <div>
                                                                <p>{{$product->short_text}}</p>
                                                                <a href="{{route('products.show', ['id' => $product->id])}}">@lang('main.more')</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="load_btn" class="load-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    @lang('main.load-more')
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sync-alt"
                                        class="svg-inline--fa fa-sync-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="#003478"
                                            d="M370.72 133.28C339.458 104.008 298.888 87.962 255.848 88c-77.458.068-144.328 53.178-162.791 126.85-1.344 5.363-6.122 9.15-11.651 9.15H24.103c-7.498 0-13.194-6.807-11.807-14.176C33.933 94.924 134.813 8 256 8c66.448 0 126.791 26.136 171.315 68.685L463.03 40.97C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.749zM32 296h134.059c21.382 0 32.09 25.851 16.971 40.971l-41.75 41.75c31.262 29.273 71.835 45.319 114.876 45.28 77.418-.07 144.315-53.144 162.787-126.849 1.344-5.363 6.122-9.15 11.651-9.15h57.304c7.498 0 13.194 6.807 11.807 14.176C478.067 417.076 377.187 504 256 504c-66.448 0-126.791-26.136-171.315-68.685L48.97 471.03C33.851 486.149 8 475.441 8 454.059V320c0-13.255 10.745-24 24-24z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                            <div class="row">
                                @foreach ($product_fam as $product)
                                <div class="col-lg-6">
                                    <div class="sorts-insurance">
                                        <h3>{{$product->title}}</h3>
                                        <div>
                                            <img src="{{'storage/' .$product->img}}" alt="" width="90">
                                            <div>
                                                <p>{{$product->short_text}}</p>
                                                <a href="{{route('products.show', ['id' => $product->id])}}">@lang('main.more')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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

    <section class="clients">
        <div class="container">
            <div class="sorts-text">
                <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.comments')</h2>
                <p class="animate__fadeInRight animate__animated wow">@lang('main.comments-desc')</p>
            </div>

            <div class="clients-slider">
                @foreach ($comments as $comment)
                <div>
                    <div class="clients-slider_item animate__animated animate__fadeInUpBig wow">
                        <p>{{$comment->description}}</p>
                        <img src="{{'storage/'.$comment->img}}" alt="" width="90px" height="auto">
                        <h4>{{$comment->name}}</h4>
                        <span>{{$comment->job}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="saving">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-card animate__fadeInLeft animate__animated wow">
                        <h3 style="text-align: center">@lang('main.communication')</h3>
                        <form action="{{route('application')}}" method="POST">
                            @csrf
                            <input name="name" type="text" placeholder="@lang('main.name')" class="form-control name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="phone" type="text" placeholder="@lang('main.phone')" class="form-control mail">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div>
                                <span></span>
                                <select name="type" type="text" class="form-control type">
                                    <option value="family_product">@lang('main.menu.family')</option>
                                    <option value="general_product">@lang('main.menu.general')</option>
                                </select>
                            </div>
                            <button type="submit">@lang('main.request')</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 animate__fadeInRight animate__animated wow">
                    <div class="quote-text">
                        <h3>@lang('main.quote')</h3>
                        <p>@lang('main.quote-text')</p>
                    </div>
                    <div>
                        <img src="{{asset('frontend/assets/images/quote_image.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="staff">
        <div class="container">
            <div class="sorts-text">
                <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.staff')</h2>
                <p class="animate__fadeInRight animate__animated wow">@lang('main.staff-desc')</p>
            </div>
            <div class="staff-slider">
                @foreach ($staffs as $staff)
                <div class="staff-item">
                    <div class="staff-img_wrapper">
                        <img src="{{'storage/'.$staff->img}}" alt="">
                    </div>
                    <h4>{{$staff->name}}</h4>
                    <span>{{$staff->job}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="contact-btn">
                <p><strong>@lang('main.cont')</strong> @lang('main.cont-answer')</p>
                <a href="{{route('contact')}}">@lang('main.cont-btn')</a>
            </div>
        </div>

        <div class="news-wrapper">
            <div class="container">
                <div class="sorts-text">
                    <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.menu.news')</h2>
                    <p class="animate__fadeInRight animate__animated wow">@lang('main.news-text')</p>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 animate__backInUp animate__animated wow">
                        <div class="news_item-wrapper">
                            <a href="{{route('articles.show', ['id' => $article->id])}}">
                                <div class="news_item">
                                    <img src="{{'storage/'.$article->img}}" alt="">
                                    <div class="news-text">
                                        <span>
                                            <img src="{{asset('frontend/assets/images//icons/calendar-alt-regular.svg')}}" alt="" width="16px">
                                            <span>{{$article->published_at}}</span>
                                        </span>
                                        <h4>{{$article->title}}</h4>
                                        <p>{{$article->short_text}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="partners" style="padding-bottom: 70px;">
        <div class="container">
            <div class="sorts-text partners-header">
                <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.partners')</h2>
                <p class="animate__fadeInRight animate__animated wow">@lang('main.partners-text')</p>
            </div>
            <div class="partners-wrapper">
                <div class="partners-slider">
                    @foreach ($partners as $item)
                        <a class="partners-item" href="{{$item->url}}" target="_blank">
                            <img src="{{'storage/'.$item->img}}" alt="" width="200">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')
<script src="{{asset('frontend/assets/js/accordion.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.js')}}"></script>

<script>
    const animateCSS = (element, animation, prefix = "animate__") =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
        const animationName = `${prefix}${animation}`
        const node = element
        console.log('node', node)
        node.classList.add(`${prefix}animated`, animationName);

        // When the animation ends, we clean the classes and resolve the Promise
        function handleAnimationEnd(event) {
        event.stopPropagation();
        node.classList.remove(`${prefix}animated`, animationName);
        resolve("Animation ended");
        }

        node.addEventListener("animationend", handleAnimationEnd, { once: true });
    });
    function animate(event, currentSlide = 0)  {
        const rotateInDownLeft = event.target.querySelectorAll('.rotateInDownLeft')
        const fadeInUp = event.target.querySelectorAll('.fadeInUp')
        const rotateInUpRight = event.target.querySelectorAll('.rotateInUpRight')
        // console.log('rotateInDownLeft', rotateInDownLeft)
        animateCSS(rotateInDownLeft[currentSlide], "rotateInDownLeft");
        animateCSS(fadeInUp[currentSlide], "fadeInUp");
        animateCSS(rotateInUpRight[currentSlide], "rotateInUpRight");
    }
    const slider = $('.hero-slider');
    slider.on('afterChange', (event, slick, currentSlide) => {
        animate(event, currentSlide)
    })
    slider.on('init', (event) => {
        animate(event)
    })

    let loadBtn = document.getElementById('load_btn');
    loadBtn.addEventListener('click', function(){
        loadBtn.style.display = 'none';
    });
    new WOW().init();
</script>
@endsection
