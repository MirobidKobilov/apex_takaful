<?php use App\Models\Menu; $sibling = Menu::all(); ?>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/bootstrap/bootstrap.min.css')}}">
    <!-- fonts -->
    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/open sans/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/rubik/stylesheet.css')}}">
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/slick/slick-theme.css')}}" />
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- main -->
    <link rel="stylesheet" href="{{asset('frontend/assets/styles/css/style.css')}}">


    @yield('style')

    <title>Apex Takaful</title>
</head>

<body>
    <div id="fade-bg" class="black-bg animate__animated animate__fadeInLeft animate__fast">
    </div>

    <div id="right-fade" class="black-bg animate__animated animate__fadeInRight animate__fast">
    </div>

    <div id="Rmenu-content" class="right-menu_content animate__animated animate__fadeInRight animate__slow">
        <div class="d-flex justify-content-between align-items-baseline">
            <a href="{{route('home')}}" class="header-logo_wrapper"><img src="{{asset('frontend/assets/images/logo.svg')}}" alt="" class="logo" width="100%"></a>
            <div class="exit-btn" id="exit-x">
                <span></span>
                <span></span>
            </div>
        </div>
        <h2>@lang('main.about-us')</h2>
        <p>@lang('main.about-text')</p>

    </div>

    <div id="hamburgerContent">
        <div class="hamburger_content animate__animated animate__fadeInLeft animate__slow">
            <div class="hamburger_header">
                <div class="d-flex justify-content-between align-items-baseline">
                    <a href="{{route('home')}}" class="header-logo_wrapper"><img src="{{asset('frontend/assets/images/logo.svg')}}" alt="" class="logo" width="100%"></a>
                    <div class="exit-btn" id="exit-y">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <div class="accordion-parent">
                        <a href="{{route('home')}}" class="parent-text">@lang('main.menu.main')</a>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-parent" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <a href="#" class="parent-text">@lang('main.menu.products')</a>
                        <img type="button" src="{{asset('frontend/assets/images/icons/arrow_down_blue.svg')}}" alt="">
                    </div>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li><a href="{{route('general-products')}}">@lang('main.menu.general')</a></li>
                                <li><a href="{{route('family-products')}}">@lang('main.menu.family')</a></li>
                                @foreach ($sibling as $item)
                                    @if ($item->parents_num == 2)
                                    <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-parent" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <a href="#" class="parent-text">@lang('main.menu.shariat')</a>
                        <img type="button" src="{{asset('frontend/assets/images/icons/arrow_down_blue.svg')}}" alt="">
                    </div>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach ($sibling as $item)
                                    @if ($item->parents_num == 3)
                                    <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-parent" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        <a href="#" class="parent-text">@lang('main.menu.media')</a>
                        <img type="button" src="{{asset('frontend/assets/images/icons/arrow_down_blue.svg')}}" alt="">
                    </div>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li><a href="{{route('news')}}">@lang('main.menu.news')</a></li>
                                <li><a href="{{route('articles')}}">@lang('main.menu.articles')</a></li>
                                <li><a href="{{route('gallery')}}">@lang('main.menu.gallery')</a></li>
                                @foreach ($sibling as $item)
                                    @if ($item->parents_num == 4)
                                    <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-parent" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        <a href="#" class="parent-text">@lang('main.menu.knowledge')</a>
                        <img type="button" src="{{asset('frontend/assets/images/icons/arrow_down_blue.svg')}}" alt="">
                    </div>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach ($sibling as $item)
                                    @if ($item->parents_num == 5)
                                    <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-parent">
                        <a href="{{route('contact')}}" class="parent-text">@lang('main.menu.contact')</a>
                    </div>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top__wrapper">
                    <ul>
                        <li><a href="https://www.instagram.com/apextakaful.uz" class="no-left-padding"><img src="{{asset('frontend/assets/images/icons/insta-icon.svg')}}" alt=""></a></li>
                        <li><a href="https://www.facebook.com/Apex-Takaful-102849685194717"><img src="{{asset('frontend/assets/images/icons/facebook-icon.svg')}}" alt=""></a></li>
                        <li><a href="https://t.me/apextakaful"><img src="{{asset('frontend/assets/images/icons/twitter-icon.svg')}}" alt=""></a></li>
                        <li><a href="mailto:info@apextakaful.uz" class="no-border"><img src="{{asset('frontend/assets/images/icons/linkedin-icon.svg')}}" alt=""></a></li>
                    </ul>
                    {{-- <ul>
                        <li><a href="#">Make a Claim</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#" class="no-border no-right-padding">Solution center</a></li>
                    </ul> --}}
                    <ul class="no-border-ul">
                        @foreach(LaravelLocalization::getSupportedLocales() as $code => $lang)
                            <li><a href="{{  LaravelLocalization::getLocalizedURL($code) }}" class="{{ $code == LaravelLocalization::getCurrentLocale() ? 'local-active' : '' }}">{{ strtoupper($lang['native']) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="header-main__wrapper">
                    <a href="{{route('home')}}" class="header-logo_wrapper"><img src="{{asset('frontend/assets/images/logo.svg')}}" alt="" class="logo"></a>
                    <div class="header-main__wrapper-contact">
                        <a href="#" class="header-main__wrapper-contact_item">
                            <div class="icon-wrapper">
                                <img src="{{asset('frontend/assets/images/icons/envelope-icon.svg')}}" alt="">
                            </div>
                            <div>
                                <div class="text-wrapper">
                                    <p>info@apextakaful.uz</p>
                                    <span>@lang('main.mail-us')</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="header-main__wrapper-contact_item">
                            <div class="icon-wrapper">
                                <img src="{{asset('frontend/assets/images/icons/phone-icon.svg')}}" alt="">
                            </div>
                            <div class="text-wrapper">
                                <p>+998 (71) 203 08 08</p>
                                <span>@lang('main.call-us')</span>
                            </div>
                        </a>
                        <a href="#" class="header-main__wrapper-contact_item no-border no-right-padding">
                            <div class="icon-wrapper">
                                <img src="{{asset('frontend/assets/images/icons/phone-icon.svg')}}" alt="">
                            </div>
                            <div class="text-wrapper">
                                <p>1188</p>
                                <span>@lang('main.call-us')</span>
                            </div>
                        </a>
                        {{-- <div class="header-main__wrapper-contact_item no-border no-right-padding">
                            <a href="#">
                                <img src="{{asset('frontend/assets/images/icons/envelope-solid-icon.svg')}}" alt="">
                                GET A QUOTE
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container header-nav__wrapper" id="navbar">
            <nav class="header-nav">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul>
                    <div class="menu-dropdown">
                        <li><a href="{{route('home')}}"><span class="hover-circle @if(Request::is('/')) show @endif"></span>@lang('main.menu.main')</a></li>
                    </div>
                    <div class="menu-dropdown">
                        <li><a href="#"><span class="hover-circle {{ Request::is('family-products') ? 'show' : (Request::is('general-products') ? 'show' : '') }}"></span>@lang('main.menu.products')<img src="{{asset('frontend/assets/images/icons/arrow_down.svg')}}" alt=""></a></li>
                        <ul class="dropdown-content menu-box-shadow">
                            <li><a href="{{route('general-products')}}">@lang('main.menu.general')</a></li>
                            <li><a href="{{route('family-products')}}">@lang('main.menu.family')</a></li>
                            @foreach ($sibling as $item)
                                @if ($item->parents_num == 2)
                                <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-dropdown">
                        <li><a href="#"><span class="hover-circle"></span>@lang('main.menu.shariat')<img src="{{asset('frontend/assets/images/icons/arrow_down.svg')}}" alt=""></a></li>
                        <ul class="dropdown-content menu-box-shadow">
                            @foreach ($sibling as $item)
                                @if ($item->parents_num == 3)
                                <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-dropdown">
                        <li><a href="#"><span class="hover-circle {{ Request::is('news') ? 'show' : (Request::is('articles') ? 'show' : (Request::is('gallery') ? 'show' : '')) }}"></span>@lang('main.menu.media')<img src="{{asset('frontend/assets/images/icons/arrow_down.svg')}}" alt=""></a></li>
                        <ul class="dropdown-content menu-box-shadow">
                            <li><a href="{{route('news')}}">@lang('main.menu.news')</a></li>
                            <li><a href="{{route('articles')}}">@lang('main.menu.articles')</a></li>
                            <li><a href="{{route('gallery')}}">@lang('main.menu.gallery')</a></li>
                            @foreach ($sibling as $item)
                                @if ($item->parents_num == 4)
                                <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-dropdown">
                        <li><a href="#"><span class="hover-circle"></span>@lang('main.menu.knowledge')<img src="{{asset('frontend/assets/images/icons/arrow_down.svg')}}" alt=""></a></li>
                        <ul class="dropdown-content menu-box-shadow">
                            @foreach ($sibling as $item)
                                @if ($item->parents_num == 5)
                                <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-dropdown">
                        <li><a href="{{route('contact')}}"><span class="hover-circle @if(Request::is('contact')) show @endif"></span>@lang('main.menu.contact')</a></li>
                    </div>
                </ul>
                <div class="header-nav__left">
                    <form action="{{route('home')}}" method="GET" class="header-nav__search">
                        <button class="search_btn"><img src="{{asset('frontend/assets/images/icons/search-icon.svg')}}" alt=""></button>
                        <input name="search" type="text" placeholder="@lang('main.search')">
                    </form>
                    <a href="#" class="header-nav__left-menu" id="right-menu">
                        <img src="{{asset('frontend/assets/images/icons/dots-icon.svg')}}" alt="">
                    </a>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4>@lang('main.menu.knowledge')</h4>
                        <ul>
                            @foreach ($sibling as $item)
                                @if($item->parents_num == 5)
                                <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4>@lang('main.menu.media')</h4>
                        <ul>
                            <li><a href="/news">@lang('main.menu.news')</a></li>
                            <li><a href="/articles">@lang('main.menu.articles')</a></li>
                            <li><a href="/gallery">@lang('main.menu.gallery')</a></li>
                            @foreach ($sibling as $item)
                                @if ($item->parents_num == 4)
                                <li><a href="{{$item->make_url}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4>@lang('main.footer.touch')</h4>
                        <p>@lang('main.footer.here')</p>
                        <div class="icon_text">
                            <img src="{{asset('frontend/assets/images/icons/adress.svg')}}" alt="">
                            <span>@lang('main.footer.adress')</span>
                        </div>
                        <div class="icon_text">
                            <img src="{{asset('frontend/assets/images/icons/phone_Gray.svg')}}" alt="">
                            <a href="tel:+998712030808">+998 (71) 203 08 08 / 1188</a>
                        </div>
                        <div class="icon_text">
                            <img src="{{asset('frontend/assets/images/icons/time.svg')}}" alt="">
                            <span>@lang('main.footer.workdays')</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>@lang('main.letter')</h4>
                        <p>@lang('main.letter-text')</p>
                        <a href="{{route('home')}}"><img src="{{asset('frontend/assets/images/logo.svg')}}" alt="" class="logo"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom_wrapper">
                    <p>Copyright ©2021 All rights reserved<br>Developed by Develop Team IT</p>
                    <div class="footer-icon_wrapper">
                        <a href="https://www.instagram.com/apextakaful.uz" class="footer-icon instagram" title="https://www.instagram.com/apextakaful.uz">
                            <img src="{{asset('frontend/assets/images/icons/instagram-icon.svg')}}" alt="">
                        </a>
                        <a href="https://www.facebook.com/Apex-Takaful-102849685194717" class="footer-icon facebook" title="https://www.facebook.com/Apex-Takaful-102849685194717">
                            <img src="{{asset('frontend/assets/images/icons/facebook_icon_white.svg')}}" alt="">
                        </a>
                        <a href="https://t.me/apextakaful" class="footer-icon telegram" title="https://t.me/apextakaful">
                            <img src="{{asset('frontend/assets/images/icons/telegram-footer-icon.svg')}}" alt="">
                        </a>
                        <a href="mailto:info@apextakaful.uz" class="footer-icon mail" title="mailto:info@apextakaful.uz">
                            <img src="{{asset('frontend/assets/images/icons/envelope-solid-small.svg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- bootstrap -->
    <script src="{{asset('frontend/assets/js/bootstrap/bootstrap.min.js')}}"></script>

    {{-- menu --}}
    <script src="{{asset('frontend/assets/js/menu.js')}}"></script>

    {{-- hamburger --}}
    <script src="{{asset('frontend/assets/js/hamburger.js')}}"></script>

    <!-- jquery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- slick -->
    <script type="text/javascript" src="{{asset('frontend/assets/slick/slick.min.js')}}"></script>

    {{-- yandex map --}}
    <script src="https://api-maps.yandex.ru/2.1?lang=ru_RU&csp[data_style]=true&apikey=6fa27589-7952-4f67-afec-b39cf405ee9d"></script>

    @yield('script')

    <!-- slick arguments -->
    <script>
        $('.hero-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false,
            arrows: false,
            cssEase: 'ease-in',
            fade: true,
            dots: true,
        });
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

        window.onscroll = function () { myFunction() };
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop + 35;
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
</body>

</html>
