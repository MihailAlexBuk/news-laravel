<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
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
                <form class="form-inline">
                    <input type="text" class="form-control" placeholder="What you are looking for?">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- end newsletter -->
        </div>
    </div><!-- end top-search -->

    <div class="topbar-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
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

                <div class="col-lg-4 hidden-md-down">
                    <div class="topmenu text-center">
                        <a class="nav-link color-red-hover" href="/">
                            <h1>SITE_NAME</h1>
                        </a>
                    </div><!-- end topmenu -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="top-search text-right">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                    </div><!-- end search -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end header-logo -->
    </div><!-- end topbar -->

    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-toggleable-md">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link color-red-hover" href="index.html">Главная</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link color-pink-hover" href="blog-category-01.html">В мире</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-red-hover" href="blog-category-02.html">Политика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-aqua-hover" href="blog-category-03.html">Происшествия</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-green-hover" href="blog-category-04.html">Общество</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="blog-category-06.html">Наука и техника</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-aqua-hover" href="blog-category-06.html">Игры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-green-hover" href="blog-category-06.html">Статьи</a>
                        </li>
                        <li class="nav-item dropdown has-submenu">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Features</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                <li><a class="dropdown-item" href="blog-author.html">Blog Author</a></li>
                                <li><a class="dropdown-item" href="page-contact.html">Contact Page</a></li>
                                <li><a class="dropdown-item" href="page-fullwidth.html">Fullwidth Page</a></li>
                                <li><a class="dropdown-item" href="page-404.html">Not Found Page</a></li>
                                <li><a class="dropdown-item" href="page-sitemap.html">Sitemap & Archives</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="notfound">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 text-center">
                                    <h2>@yield('code')</h2>
                                    <h3>@yield('message')</h3>
                                    <a href="/" class="btn btn-primary mt-4">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/upload/blog_square_01.jpg')}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                        <small>12 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/upload/blog_square_02.jpg')}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                        <small>11 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{asset('assets/upload/blog_square_03.jpg')}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                        <small>07 Jan, 2016</small>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/upload/blog_square_04.jpg')}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                    </div>
                                </a>

                                <a href="single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/upload/blog_square_07.jpg')}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                    </div>
                                </a>

                                <a href="single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{asset('assets/upload/blog_square_06.jpg')}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                    </div>
                                </a>
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
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
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

</body>

</html>
