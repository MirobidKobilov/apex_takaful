@extends('layouts.frontend')

@section('content')
    <main>
        <section class="main-slider">
            <div class="hero-slider">
                @foreach ($sliders as $key => $slider )
                    <div class="hero-slider_item">
                        <div class="slider-wrapper">
                            <div class="slider">
                                <div class="slides-container">
                                    <div class="slide-wrapper">
                                        <div class="slide" data-order="{{$key + 1}}">
                                            <img src="{{ 'storage/' . $slider->img }}" alt="" />
                                            <div class="slider-gradient">
                                            </div>
                                            <div class="slide-content">
                                                <h1>{{ $slider->short_text }}</h1>
                                                <h2>{{ $slider->title }}</h2>
                                                <div class="slide-txt">
                                                    <p>{{ $slider->long_text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                style="background-image: url('{{ 'storage/' . $item->img }}');">
                                <div class="awards-feature_item--hover">
                                    <div class="awards-feature_item--content">
                                        @if ($item->icon)
                                            <img src="{{ 'storage/' . $item->icon }}" alt="">
                                        @endif
                                        <p>{{ $item->short_text }}</p>
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
                            <img class="animate__fadeInLeft animate__animated wow"
                                src="{{ asset('frontend/assets/images/camel2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="policy-wrapper_text animate__fadeInRight animate__animated wow">
                        <h2>@lang('main.hadis.author')</h2>
                        <p>@lang('main.hadis.text')</p>
                        <p>@lang('main.hadis.author_2')</p>
                        <p>@lang('main.hadis.text_2')</p>
                        <p class="source">@lang('main.hadis.source')</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="sorts">
            <div class="container">
                <div class="sorts-text">
                    <h2 class="animate__fadeInLeft animate__animated wow">@lang('main.takaful')<br>@lang('main.islamic')
                    </h2>
                    <p class="animate__fadeInRight animate__animated wow">@lang('main.product-text')</p>
                </div>
                <div class="row">
                    <div class="form-card">
                        <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item mx-2 animate__fadeInLeft animate__animated wow" role="presentation">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                    data-bs-target="#general" type="button" role="tab" aria-controls="general"
                                    aria-selected="false">@lang('main.menu.general')</button>
                            </li>
                            <li class="nav-item mx-4 animate__fadeInRight animate__animated wow" role="presentation">
                                <button class="nav-link" id="family-tab" data-bs-toggle="tab" data-bs-target="#family"
                                    type="button" role="tab" aria-controls="family"
                                    aria-selected="true">@lang('main.menu.family')</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel"
                                aria-labelledby="general-tab">
                                <div class="row">
                                    @foreach ($product_gen_2 as $product)
                                        @if ($product->type == 'general')
                                            <div class="col-lg-6">
                                                <div class="sorts-insurance animate__animated animate__fadeInUpBig wow">
                                                    <h3>{{ $product->title }}</h3>
                                                    <div>
                                                        <img src="{{ 'storage/' . $product->img }}" alt="" width="90">
                                                        <div>
                                                            <p>{{ $product->short_text }}</p>
                                                            <a
                                                                href="{{ route('products.show', ['id' => $product->id]) }}">@lang('main.more')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <div id="collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    @foreach ($product_gen as $product)
                                                        <div class="col-lg-6">
                                                            <div class="sorts-insurance">
                                                                <h3>{{ $product->title }}</h3>
                                                                <div>
                                                                    <img src="{{ 'storage/' . $product->img }}" alt=""
                                                                        width="90">
                                                                    <div>
                                                                        <p>{{ $product->short_text }}</p>
                                                                        <a
                                                                            href="{{ route('products.show', ['id' => $product->id]) }}">@lang('main.more')</a>
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
                                    <button id="load_btn" class="load-btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        @lang('main.load-more')
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sync-alt"
                                            class="svg-inline--fa fa-sync-alt fa-w-16" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
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
                                                <h3>{{ $product->title }}</h3>
                                                <div>
                                                    <img src="{{ 'storage/' . $product->img }}" alt="" width="90">
                                                    <div>
                                                        <p>{{ $product->short_text }}</p>
                                                        <a
                                                            href="{{ route('products.show', ['id' => $product->id]) }}">@lang('main.more')</a>
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
                        <img src="{{ asset('frontend/assets/images/icons/phone-icon-white.svg') }}" alt="">
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
                                <p>{{ $comment->description }}</p>
                                <img src="{{ 'storage/' . $comment->img }}" alt="" width="90px" height="auto">
                                <h4>{{ $comment->name }}</h4>
                                <span>{{ $comment->job }}</span>
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
                            <form action="{{ route('application') }}" method="POST">
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
                            <img src="{{ asset('frontend/assets/images/quote_image.png') }}" alt="">
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
                                <img src="{{ 'storage/' . $staff->img }}" alt="">
                            </div>
                            <h4>{{ $staff->name }}</h4>
                            <span>{{ $staff->job }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="news">
            <div class="container">
                <div class="contact-btn">
                    <p><strong>@lang('main.cont')</strong> @lang('main.cont-answer')</p>
                    <a href="{{ route('contact') }}">@lang('main.cont-btn')</a>
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
                                    <a href="{{ route('articles.show', ['id' => $article->id]) }}">
                                        <div class="news_item">
                                            <img src="{{ 'storage/' . $article->img }}" alt="">
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
                            <a class="partners-item" href="{{ $item->url }}" target="_blank">
                                <img src="{{ 'storage/' . $item->img }}" alt="" width="200">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script src="{{ asset('frontend/assets/js/accordion.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

    <script>
        var initialSlide = $('.slides-container [data-order="1"]')
        var initalSelected = $('.slide-navigation__txt [data-order="1"]')
        var mq_medium = window.matchMedia("(min-width: 860px)")
        var mq_big = window.matchMedia("(min-width: 1200px)")

        function activate_slide(order) {
            var unactiveSlide = $(".slide.active")
            var activeSlide = $(`.slides-container [data-order=${order}]`)
            if (!activeSlide.hasClass("active")) {
                slide_in(activeSlide)
                slide_out(unactiveSlide)
            }
        }

        function slide_in(slide) {
            var _this = slide

            animation_in(slide)
            _this.addClass("active")
            TweenMax.to(_this, 1, {
                autoAlpha: 1
            }, "-=1")
        }

        function slide_out(slide) {
            var _this = slide

            _this.css("z-index", "2")
            _this.removeClass("active")
            TweenMax.to(_this, 1, {
                autoAlpha: 0,
                onComplete: removeZ
            })

            function removeZ() {
                _this.css("z-index", "1")
            }

            animation_out(slide)
        }

        function animation_in(slide) {
            var title = slide.find("h1")
            var subtitle = $(slide).find("h2")
            var text = $(slide).find("p")
            var button = $(slide).find("button")
            var image = $(slide).find("img")

            TweenMax.fromTo(
                title,
                0.6, {
                    autoAlpha: 0,
                    x: 100
                }, {
                    autoAlpha: 0.6,
                    x: 0,
                    ease: Power2.easeOut
                }
            )
            TweenMax.fromTo(
                subtitle,
                0.5, {
                    autoAlpha: 0,
                    x: -200
                }, {
                    autoAlpha: 1,
                    x: 0,
                    ease: Power2.easeOut
                },
                "-0.1"
            )
            TweenMax.fromTo(
                text,
                0.8, {
                    autoAlpha: 0,
                    x: 50
                }, {
                    autoAlpha: 1,
                    x: 0,
                    ease: Power2.easeOut
                }
            )
            TweenMax.fromTo(button, 0.5, {
                autoAlpha: 0
            }, {
                autoAlpha: 1
            })
            TweenMax.to(image, 0, {
                autoAlpha: 1,
                scale: 1
            })
        }

        function animation_out(slide) {
            var title = slide.find("h1")
            var subtitle = $(slide).find("h2")
            var text = $(slide).find("p")
            var button = $(slide).find("button")
            var image = $(slide).find("img")

            TweenMax.to(title, 0.6, {
                autoAlpha: 0,
                x: 0
            })
            TweenMax.to(subtitle, 0.5, {
                autoAlpha: 0,
                x: 200
            })
            TweenMax.to(text, 0.5, {
                autoAlpha: 0
            })
            TweenMax.to(button, 0.5, {
                autoAlpha: 0
            })
            TweenMax.to(image, 1, {
                scale: 1.1
            })
        }

        $(".slide-navigation__txt span").on("click", function() {
            var _this = $(this)
            console.log("this", _this)
            var order = _this.data("order")
            var spans = $(".slide-navigation__txt span")
            var current = $(".active").data("order")

            spans.removeClass("active")
            _this.addClass("active")
            activate_slide(order)
            stagger_squares(order, current)
        })

        function stagger_squares(order, current) {
            var mq = 0.7
            var moveY
            var squares = $(".slide-navigation__squares .square")
            var staggerTime = -0.12

            if (order < current) {
                staggerTime = staggerTime * -1
            }

            if (mq_medium.matches) {
                mq = 1
            }
            if (mq_big.matches) {
                mq = 1.3
            }

            moveY = (order - 1) * (15 * mq)
            TweenMax.staggerTo(squares, 0.1, {
                y: moveY
            }, staggerTime)
        }

        $(document).ready(function() {
            initialSlide.addClass("active")
            initalSelected.addClass("active")
            TweenMax.to(initialSlide, 0.5, {
                autoAlpha: 1
            })
        })

        const slider = $(".hero-slider")
        slider.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
            activate_slide(nextSlide + 1)
        })

        slider.on("init", () => {
            activate_slide(1)
        })

        $(".hero-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false,
            arrows: false,
            cssEase: "linear",
            fade: true,
            dots: true,
        })
        $('.clients-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            centerMode: true,
            centerPadding: '60px',
            dots: true,
        });
        $('.staff-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            pauseOnHover: false,
            arrows: false,
            fade: false,
            dots: true,
        });
        $('.partners-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            pauseOnHover: false,
            arrows: false,
            fade: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 1500,
        });

        let loadBtn = document.getElementById('load_btn');
        loadBtn.addEventListener('click', function() {
            loadBtn.style.display = 'none';
        });
        new WOW().init();
    </script>
@endsection
