@extends('user.layouts.main')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-envelope-o"></i> Связаться с нами</h2>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Немного о нас</h4>
                                <p>Cloapedia — это персональный блог, посвященный фотографиям ручной работы, фотографиям, сделанным с помощью камеры, и модным стилям от независимых креативщиков со всего мира.</p>
                            </div>

                            <div class="col-lg-6">
                                <h4>Чем мы можем помочь?</h4>
                                <p>Если вы хотите написать нам, разместить рекламу у нас или просто поздороваться, заполните форму ниже, и мы свяжемся с вами как можно скорее.</p>
                            </div>

                            <div class="col-lg-12">
                                <blockquote class="blockquote">Пожалуйста, прочитайте <a href='#'>Лицензионное соглашение и условия использования</a>.</blockquote>
                            </div>
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="{{route('contact_form')}}" class="form-wrapper">
                                    @csrf
                                    <h4>Форма обратной связи</h4>
                                    @error('name')
                                        <div class="alert alert-danger text-center mt-1 mb-2">{{ $message }}</div>
                                    @enderror
                                    <input name='name' type="text" class="form-control" placeholder="Ваше имя">
                                    @error('email')
                                        <div class="alert alert-danger text-center mt-1 mb-2">{{ $message }}</div>
                                    @enderror
                                    <input name='email' type="text" class="form-control" placeholder="Email адрес">
                                    @error('message')
                                        <div class="alert alert-danger text-center mt-1 mb-2">{{ $message }}</div>
                                    @enderror
                                    <textarea name='message' class="form-control" placeholder="Ваше сообщение"></textarea>
                                    <button type="submit" class="btn btn-primary">Отправить <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>


                        </div>
                    </div><!-- end page-wrapper -->
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


