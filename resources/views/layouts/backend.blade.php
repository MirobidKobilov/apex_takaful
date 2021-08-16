<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Takaful Admin</title>

        <!-- custom css -->
        {{-- <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}"> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!-- Icons -->
        <link href="{{asset('backend/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
        <link href="{{asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

        <!-- Argon CSS -->
        <link type="text/css" href="{{asset('backend/assets/css/argon.css')}}" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">
        
        @yield('stlye')

    </head>

    <body>
        <!-- Sidenav -->
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header d-flex align-items-center">
                    <a class="navbar-brand" href="/syspanel">
                        <img src="{{asset('frontend/assets/images/logo.svg')}}" class="navbar-brand-img" alt="...">
                    </a>
                    <div class="ml-auto">
                        <!-- Sidenav toggler -->
                        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel')) active @endif" href="/syspanel">
                                    <i class="fas fa-tachometer-alt text-default"></i>
                                    <span class="nav-link-text text-default">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/page')) active @endif" href="{{ route('backend.page.show') }}">
                                    <i class="fas fa-file text-default"></i>
                                    <span class="nav-link-text text-default">Страницы</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/menu')) active @endif" href="{{ route('backend.menu.show') }}">
                                    <i class="fas fa-th-large text-default"></i>
                                    <span class="nav-link-text text-default">Меню</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/sliders')) active @endif" href="{{ route('backend.sliders.show') }}">
                                    <i class="fas fa-images text-default"></i>
                                    <span class="nav-link-text text-default">Слайдеры</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/features')) active @endif" href="{{ route('backend.features.show') }}">
                                    <i class="fas fa-feather-alt text-default"></i>
                                    <span class="nav-link-text text-default">Особенности</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/gallery')) active @endif" href="{{ route('backend.galleries.show') }}">
                                    <i class="fas fa-file-image text-default"></i>
                                    <span class="nav-link-text text-default">Галерея</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/products')) active @endif" href="{{ route('backend.products.show') }}">
                                    <i class="fas fa-heartbeat text-default"></i>
                                    <span class="nav-link-text text-default">Продукты</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/articles')) active @endif" href="{{ route('backend.articles.show') }}">
                                    <i class="far fa-newspaper text-default"></i>
                                    <span class="nav-link-text text-default">Новости</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/comments')) active @endif" href="{{ route('backend.comments.show') }}">
                                    <i class="fas fa-comments text-default"></i>
                                    <span class="nav-link-text text-default">Комменты</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/staffs')) active @endif" href="{{ route('backend.staffs.show') }}">
                                    <i class="fas fa-users text-default"></i>
                                    <span class="nav-link-text text-default">Работники</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/partners')) active @endif" href="{{ route('backend.partners.show') }}">
                                    <i class="fas fa-handshake text-default"></i>
                                    <span class="nav-link-text text-default">Партнёры</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/branches')) active @endif" href="{{ route('backend.branches.show') }}">
                                    <i class="fas fa-handshake text-default"></i>
                                    <span class="nav-link-text text-default">Филиалы</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/applications')) active @endif" href="{{ route('backend.applications.show') }}">
                                    <i class="ni ni-align-left-2 text-default"></i>
                                    <span class="nav-link-text text-default">Заявки</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/filemanager')) active @endif" href="{{ route('backend.filemanager') }}">
                                    <i class="fas fa-file-upload text-default"></i>
                                    <span class="nav-link-text text-default">Файл менеджер</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Header -->
            <header class="header header-body bg-primary pb-8">
                <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Navbar links -->
                            <ul class="navbar-nav align-items-center ml-md-auto">
                                <li class="nav-item d-xl-none">
                                    <!-- Sidenav toggler -->
                                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                        data-target="#sidenav-main">
                                        <div class="sidenav-toggler-inner">
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link notif" href="{{route('backend.applications.show')}}">
                                        <i class="@if(DB::table('applications')->where('seen', 0)->count() !== 0) bell @endif ni ni-bell-55"></i>
                                        <span class="notif-num @if(DB::table('applications')->where('seen', 0)->count() == 0) d-none @endif">{{DB::table('applications')->where('seen', 0)->count()}}</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav align-items-center ml-auto ml-md-0 no-select">
                                <li class="nav-item dropdown">
                                    <a class="nav-link pr-0" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle">
                                                <img alt="Image placeholder" src="{{asset('frontend/assets/images/avatar.png')}}">
                                            </span>
                                            <div class="media-body ml-2 d-none d-lg-block">
                                                <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->email}}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{route('backend.password.index')}}" class="dropdown-item">
                                            <i class="ni ni-single-02"></i>
                                            <span>Мой профиль</span>
                                        </a>
                                        <a href="{{route('logout')}}" class="dropdown-item">
                                            <i class="ni ni-user-run"></i>
                                            <span>Выйти</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')

            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6">
                            {{-- <div class="copyright text-center text-lg-left text-muted">
                                &copy; 2020 <a href="apex" class="text-default font-weight-bold ml-1"
                                    target="_blank">apex insurance</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="{{asset('backend/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/js-cookie/js.cookie.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Optional JS -->
        <script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
        <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: ".js-selector",
                theme: "silver",
                height:500,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Title', block: 'h2', classes: 'title-redactor'},
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h3', styles: {color: 'green'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],
                file_picker_callback : function(callback, value, meta) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                    
                    tinymce.activeEditor.windowManager.openUrl({
                        url : '/file-manager/tinymce5',
                        title : 'Laravel File manager',
                        width : x * 0.8,
                        height : y * 0.8,
                        onMessage: (api, message) => {
                        callback(message.content, { text: message.text })
                        }
                    })
                }
            });  
        </script>
        
        @yield('script')
        <!-- Argon JS -->
        <script src="{{asset('backend/assets/js/argon.min.js')}}"></script>
        <!-- Datatable JS -->
        <script src="{{asset('backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- crud JS -->
        <script src="{{asset('backend/assets/js/crud.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{asset('backend/assets/js/custom.js')}}"></script>

        
        <script>
            $('.notif').on('click', function(e){
                $('.notif').removeClass('bell');
                $('.notif-num').addClass('d-none');
            })
        </script>

    </body>

</html>