@extends('user.layouts.main')

@section('content')
    <div class="page-title wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Поиск "{{$search}}"</h2>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="{{asset('assets/upload/banner_02.jpg')}}" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis">

                        <div class="blog-grid-system">
                            <div class="row">
                                @foreach($posts as $post)
                                <div class="col-md-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="{{route('user.post', $post->id)}}" title="">
                                                <img src="{{Storage::url($post->preview_image)}}" alt="Не удалось загрузить изображение" class="img-fluid">
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta big-meta">
                                            <h4><a href="{{route('user.post', $post->id)}}" title="">{{$post->title}}</a></h4>
                                            <small><a href="{{route("user.category", $post->category->id)}}" title="">{{$post->category->title}}</a></small>
                                            <small>{{$post->created_at}}</small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                                @endforeach
                            </div><!-- end row -->
                        </div><!-- end blog-grid-system -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis3">

                    <div class="row">
                        <div class="col-md-12 offset-md-2">
                            {{$posts->links()}}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title">Недавние Посты</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach($data['recent_posts'] as $recent_post)
                                    <a href="{{route('user.post', $recent_post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{Storage::url($recent_post->preview_image)}}" alt="Не удалось загрузить изображение" class="img-fluid float-left">
                                            <h5 class="mb-1">{{$recent_post->title}}</h5>
                                            <small>{{$recent_post->created_at}}</small>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Advertising</h2>
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{asset('assets/upload/banner_03.jpg')}}" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Популярные Посты</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach($data['popular_posts'] as $popular_post)
                                        <a href="{{route('user.post', $popular_post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{Storage::url($popular_post->preview_image)}}" alt="Не удалось загрузить изображение" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$popular_post->title}}</h5>
                                                <small>{{$popular_post->created_at}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
