@extends('user.layouts.main')

@section('content')
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="left-side">
                    <div class="masonry-box post-media">
                        <img style="width: 443px; height: 381px;" src="{{Storage::url($last_view_posts[0]->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-aqua"><a href="{{route('user.category', $last_view_posts[0]->category->id)}}" title="">{{$last_view_posts[0]->category->title}}</a></span>
                                    <h4><a href="{{route('user.post', $last_view_posts[0]->id)}}" title="">{{$last_view_posts[0]->title}}</a></h4>
                                    <small>{{$last_view_posts[0]->created_at->diffForHumans()}}</small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end left-side -->

                <div class="center-side">
                    <div class="masonry-box post-media">
                        <img src="{{Storage::url($last_view_posts[1]->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-green"><a href="{{route('user.category', $last_view_posts[1]->category->id)}}" title="">{{$last_view_posts[1]->category->title}}</a></span>
                                    <h4><a href="{{route('user.post', $last_view_posts[1]->id)}}" title="{{$last_view_posts[1]->title}}">{{ mb_substr($last_view_posts[1]->title, 0, 180) }}...</a></h4>
                                    <small>{{$last_view_posts[1]->created_at->diffForHumans()}}</small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->

                    <div class="masonry-box small-box post-media">
                        <img src="{{Storage::url($last_view_posts[2]->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-green"><a href="{{route('user.category', $last_view_posts[2]->category->id)}}" title="">{{$last_view_posts[2]->category->title}}</a></span>
                                    <h4><a href="{{route('user.post', $last_view_posts[2]->id)}}" title="{{$last_view_posts[2]->title}}">{{mb_substr($last_view_posts[2]->title, 0, 40) }}...</a></h4>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->

                    <div class="masonry-box small-box post-media">
                        <img src="{{Storage::url($last_view_posts[3]->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-green"><a href="{{route('user.category', $last_view_posts[3]->category->id)}}" title="">{{$last_view_posts[3]->category->title}}</a></span>
                                    <h4><a href="{{route('user.post', $last_view_posts[3]->id)}}" title="{{$last_view_posts[3]->title}}">{{mb_substr($last_view_posts[3]->title, 0, 40) }}...</a></h4>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end left-side -->

                <div class="right-side hidden-md-down">
                    <div class="masonry-box post-media">
                        <img style="width: 443px; height: 381px;" src="{{Storage::url($last_view_posts[4]->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-aqua"><a href="{{route('user.category', $last_view_posts[4]->category->id)}}" title="">{{$last_view_posts[4]->category->title}}</a></span>
                                    <h4><a href="{{route('user.post', $last_view_posts[4]->id)}}" title="">{{$last_view_posts[4]->title}}</a></h4>
                                    <small>{{$last_view_posts[4]->created_at->diffForHumans()}}</small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end right-side -->
            </div><!-- end masonry -->
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h3 class="color-aqua"><a href="{{route('user.category',$category_posts['posts_politic']['category']['id'])}}" title="">{{$category_posts['posts_politic']['category']['title']}}</a></h3>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @foreach($category_posts['posts_politic']['posts'] as $post)
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="{{route('user.post', $post->id)}}" title="">
                                        <img src="{{Storage::url($post->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta big-meta">
                                    <h4><a href="{{route('user.post', $post->id)}}" title="">{{$post->title}}</a></h4>
                                    <small><a href="{{route('user.category', $post->category->id)}}">{{$post->category->title}}</a></small>
                                    <small>{{$post->created_at->diffForHumans()}}</small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                            <hr class="invis">
                            @endforeach

                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h3 class="color-pink"><a href="{{route('user.category',$category_posts['posts_world']['category']['id'])}}" title="">{{$category_posts['posts_world']['category']['title']}}</a></h3>
                    </div><!-- end title -->
                    <div class="row">
                        @foreach($category_posts['posts_world']['posts'] as $post)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="{{route('user.post', $post->id)}}" title="">
                                        <img src="{{Storage::url($post->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <h4><a href="{{route('user.post', $post->id)}}" title="">{{$post->title}}</a></h4>
                                    <small><a href="{{route('user.category', $post->category->id)}}" title="">{{$post->category->title}}</a></small>
                                    <small>{{$post->created_at->diffForHumans()}}</small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                            <hr class="invis">

                        </div><!-- end col -->
                        @endforeach
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="{{asset('assets/upload/banner_01.jpg')}}" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-list clearfix">
                        <div class="section-title">
                            <h3 class="color-green"><a href="{{route('user.category', $category_posts['posts_science']['category']['id'])}}" title="">{{$category_posts['posts_science']['category']['title']}}</a></h3>
                        </div><!-- end title -->
                        @foreach($category_posts['posts_science']['posts'] as $post)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{route('user.post', $post->id)}}" title="">
                                        <img src="{{Storage::url($post->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{route('user.post', $post->id)}}" title="">{{$post->title}}</a></h4>
                                <p>{!! mb_substr($post->desc, 0, 180) !!}...</p>
                                <small><a href="{{route('user.category', $post->category->id)}}" title="">{{$post->category->title}}</a></small>
                                <small>{{$post->created_at->diffForHumans()}}</small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        <hr class="invis">
                        @endforeach
                    </div><!-- end blog-list -->

                    <hr class="invis">

                    <div class="blog-list clearfix">
                        <div class="section-title">
                            <h3 class="color-red"><a href="{{route('user.category', $category_posts['posts_community']['category']['id'])}}" title="">{{$category_posts['posts_community']['category']['title']}}</a></h3>
                        </div><!-- end title -->

                        @foreach($category_posts['posts_community']['posts'] as $post)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{route('user.post', $post->id)}}" title="">
                                        <img src="{{Storage::url($post->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{route('user.post', $post->id)}}" title="">{{$post->title}}</a></h4>
                                <p>{!! mb_substr($post->desc, 0, 180) !!}...</p>
                                <small><a href="{{route('user.category', $post->category->id)}}" title="">{{$post->category->title}}</a></small>
                                <small>{{$post->created_at->diffForHumans()}}</small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                        @endforeach
                    </div><!-- end blog-list -->
                </div><!-- end col -->

                <div class="col-lg-3">
                    <div class="section-title">
                        <h3 class="color-yellow"><a href="{{route('user.category', $category_posts['posts_games']['category']['id'])}}" title="">{{$category_posts['posts_games']['category']['title']}}</a></h3>
                    </div><!-- end title -->

                    @foreach($category_posts['posts_games']['posts'] as $post)
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="{{route('user.post', $post->id)}}" title="">
                                <a href="{{route('user.post', $post->id)}}" title="">
                                    <img src="{{Storage::url($post->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                                </a>
                            </a>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h6><a class="" href="{{route('user.post', $post->id)}}" title="{{$post->title}}">{{mb_substr($post->title, 0, 40) }}...</a></h6>
                            <small><a href="{{route('user.category', $post->category->id)}}" title="">{{$post->category->title}}</a></small>
                            <small>{{$post->created_at->diffForHumans()}}</small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->

                    <hr class="invis">
                    @endforeach

                    <div class="section-title">
                        <h3 class="color-yellow"><a href="{{route('user.category', $category_posts['posts_incident']['category']['id'])}}" title="">{{$category_posts['posts_incident']['category']['title']}}</a></h3>
                    </div><!-- end title -->

                    @foreach($category_posts['posts_incident']['posts'] as $post)
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="{{route('user.post', $post->id)}}" title="">
                                    <a href="{{route('user.post', $post->id)}}" title="">
                                        <img src="{{Storage::url($post->preview_image)}}" alt="Ошибка изображения" class="img-fluid">
                                    </a>
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h6><a href="{{route('user.post', $post->id)}}" title="{{$post->title}}">{{mb_substr($post->title, 0, 45) }}...</a></h6>
                                <small><a href="{{route('user.category', $post->category->id)}}" title="">{{$post->category->title}}</a></small>
                                <small>{{$post->created_at->diffForHumans()}}</small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                    @endforeach
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="{{asset('assets/upload/banner_02.jpg')}}" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
