<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cloapedia - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet">
</head>

<body>

<div id="preloader">
    <img class="preloader" src="{{asset('assets/images/loader.gif')}}" alt="">
</div>

<div id="wrapper">
    <div class="collapse top-search" id="collapseExample">
        <div class="card card-block">
            <div class="newsletter-widget text-center">
                <form class="form-inline" action="{{route('user.search')}}" method="POST">
                    @csrf
                    @method('POST')
                    <textarea name="search" class="form-control fs-1" placeholder="Что ищем?"></textarea>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- end newsletter -->
        </div>
    </div><!-- end top-search -->

    {{-- ERRORS --}}
    @error('search')
        <div class="alert alert-danger text-center mt-1 mb-2">{{ $message }}</div>
    @enderror
    @error('comment')
        <div class="alert alert-danger text-center mt-1 mb-2">{{ $message }}</div>
    @enderror
    @error('email')
        <div class="alert alert-danger text-center mt-1 mb-2">{{ $message }}</div>
    @enderror
    @if (\Session::has('success'))
        <div class="alert alert-success text-center mt-1 mb-2">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div class="topbar-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-6 col-sm-6 hidden-xs-down">
                    <div class="topsocial">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                    </div><!-- end social -->
                </div><!-- end col -->

                <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                    <div class="top-search text-right">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Поиск</a>
                    </div><!-- end search -->
                </div><!-- end col -->

                <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                @guest
                    <div class="dropdown">
                        <a  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (Route::has('login'))
                        <a class="dropdown-item" href="{{route('login')}}">Авторизация</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="dropdown-item" href="{{route('register')}}">Регистрация</a>
                    @endif
                        </div>
                    </div>
                @else
                <div class="dropdown">
                    <a  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">{{ Auth::user()->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        Выйти
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    </div>
                </div>
                @endguest

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end header-logo -->
    </div><!-- end topbar -->
    <div class="col-lg-12 hidden-md-down mt-5">
        <div class="topmenu text-center">
            <a class="nav-link color-red-hover" href="/">
                <h1>SITE_NAME</h1>
            </a>
        </div><!-- end topmenu -->
    </div><!-- end col -->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-toggleable-md">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link color-red-hover" href="/">Главная</a>
                        </li>
                        @foreach($data['categories'] as $category)
                        <li class="nav-item">
                            <a class="nav-link color-green-hover" href="{{route("user.category", $category->id)}}">{{$category->title}}</a>
                        </li>
                        @endforeach
                        <li class="nav-item dropdown has-submenu">
                            <a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Разное</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                <li><a class="dropdown-item" href="{{route('user.contacts')}}">Связаться с нами</a></li>
                                <li><a class="dropdown-item" href="{{route('user.license')}}">Лицензионное соглашение</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Недавно добавленные</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($data['recent_posts'] as $recent_post)
                                <a href="{{route('user.post', $recent_post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{Storage::url($recent_post->preview_image)}}" alt="Ошибка изображения" class="img-fluid float-left">
                                        <small>{{$recent_post->created_at->diffForHumans()}}</small>
                                        <h5 class="mb-1">{{$recent_post->title}}</h5>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Популярные</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($data['popular_posts'] as $popular_post)
                                    <a href="{{route('user.post', $popular_post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{Storage::url($popular_post->preview_image)}}" alt="Ошибка изображения" class="img-fluid float-left">
                                            <small>{{$popular_post->created_at->diffForHumans()}}</small>
                                            <h5 class="mb-1">{{$popular_post->title}}</h5>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Самые просматриваемые</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($data['most_view_posts'] as $most_view_post)
                                    <a href="{{route('user.post', $most_view_post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{Storage::url($most_view_post->preview_image)}}" alt="Ошибка изображения" class="img-fluid float-left">
                                            <small>{{$most_view_post->created_at->diffForHumans()}}</small>
                                            <h5 class="mb-1">{{$most_view_post->title}}</h5>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">


                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form action="{{route('subscribe')}}" method="POST" class="form-inline">
                                        @csrf
                                        <input type="text" name="email" class="form-control" placeholder="Введите ваш email адрес">
                                        <button type="submit" class="btn btn-primary">Подписаться <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                                <p>Cloapedia is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <br>
                    <div class="copyright">&copy; Cloapedia. Design: <a href="http://html.design">HTML Design</a>.</div>
                </div>
            </div>
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="dmtop" style="background-image: url({{asset('assets/images/arrow.png')}});">Scroll to Top</div>

</div><!-- end wrapper -->




<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/tether.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
@yield('scripts')

</body>

</html>
