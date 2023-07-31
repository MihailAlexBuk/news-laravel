@extends('user.layouts.main')

@section('content')

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area">
                        <h3>{{$post->title}}</h3>

                        <div class="blog-meta big-meta">
                            <small>{{$post->created_at}}</small>
                            <small><i class="fa fa-eye"></i> {{$views_count}}</small>
                        </div><!-- end meta -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="{{Storage::url($post->preview_image)}}" alt="" class="img-fluid">
                        <a href="https://{{$post->redaction}}" target="_blank" style="font-size: 16px; color: #898787" class="">Источник: {{$post->redaction}}</a>
                    </div><!-- end media -->

                    <div class="blog-content">
                        <div class="pp">
                            <p>{!! $post->desc !!}</p>
                        </div>
                    </div><!-- end content -->

                    <div class="blog-title-area">

                        <div class="tag-cloud-single">
{{--                            <span>Теги</span>--}}
                            @foreach($post->tags as $tag)
                            <small><a href="{{route('user.search_by_tag', $tag->id)}}" title="">{{$tag->title}}</a></small>
                            @endforeach
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    {{--                    LIKE_DISLIKE--}}
                    <div class="row d-flex justify-content-end">
                        <div class="">
                            @auth()
                                <div>
                                    <span title="Likes" id="saveLikeDislike" data-type="like" data-like data-post="{{$post->id}}" class="mr-2 pointer-btn gp-button  btn-outline-success d-inline font-weight-bold">
                                        Like
                                        <span class="like-count">{{$post->likes()}}</span>
                                    </span>
                                        <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-dislike data-post="{{$post->id}}" class="mr-2 pointer-btn gp-button  btn-outline-danger d-inline font-weight-bold">
                                        Dislike
                                        <span class="dislike-count">{{$post->dislikes()}}</span>
                                    </span>
                                </div>
                            @endauth
                            @guest()
                                <div>
                                    <a href="{{route('login')}}" title="Likes" class="mr-2 gp-button pointer-btn btn-outline-success d-inline font-weight-bold">
                                        Like
                                        <span class="like-count">{{$post->likes()}}</span>
                                    </a>
                                    <a href="{{route('login')}}" title="Dislikes" class="mr-2 gp-button pointer-btn btn-outline-danger d-inline font-weight-bold">
                                        Dislike
                                        <span class="dislike-count">{{$post->dislikes()}}</span>
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>

                    <hr class="invis1">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{asset('assets/upload/banner_01.jpg')}}" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">
{{--COMMENTS--}}
                    <div class="custombox clearfix">
                        @error('comment')
                            <div class="alert alert-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror
                        <h4 class="small-title">{{$post['comments']->count()}} комментариев</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">

                                    @foreach($post['comments'] as $comment)
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img src="{{asset('assets/upload/author.jpg')}}" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading user_name">{{$comment->user->name}} <small>{{$comment->created_at->diffForHumans()}}</small></h4>
                                            <p>{{$comment->comment}}</p>
                                            @Auth()
                                            <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseReplyComment{{$comment->id}}"><span class="small"> ответить</span></a>
                                            @endauth
                                            {{--REPLY--}}
                                            @if(count($comment->replies) > 0)
                                                @if(count($comment->replies) == 1)
                                                    <a data-toggle="collapse" href="#collapseReplies{{$comment->id}}"><span class="small">{{count($comment->replies)}} ответ <i class="fa fa-angle-down"></i></span></a>
                                                @elseif(count($comment->replies) > 1 && count($comment->replies) < 5)
                                                    <a data-toggle="collapse" href="#collapseReplies{{$comment->id}}"><span class="small">{{count($comment->replies)}} ответа <i class="fa fa-angle-down"></i></span></a>
                                                @else
                                                    <a data-toggle="collapse" href="#collapseReplies{{$comment->id}}"><span class="small">{{count($comment->replies)}} ответов <i class="fa fa-angle-down"></i></span></a>
                                                @endif
                                                <div class="collapse" id="collapseReplies{{$comment->id}}">
                                                    @foreach($comment->replies as $reply)
                                                        <div class="d-flex flex-start mt-2">
                                                            <a class="me-3 mt-1 link" href="">
                                                                <img class="rounded-circle shadow-1-strong"
                                                                     src="{{asset('assets/upload/author.jpg')}}" alt="avatar"
                                                                     width="65" height="65" />
                                                            </a>
                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <p class="mb-1">
                                                                            <a class="me-3 link" href="">
                                                                                {{$reply->user->name}} <span class="small">- {{$reply->created_at->diffForHumans()}}</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <p class="small mb-0">
                                                                        {{$reply->comment}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            @endif
                                            <form class="collapse mt-2" id="collapseReplyComment{{$comment->id}}" class="" action="{{route('user.post.add_comment')}}" method="POST">
                                                @csrf
                                                <div class="d-flex col-10">
                                                    <input type="text" name="comment" class="ms-2 my-auto form-control" placeholder="Ответить на комментарий">
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                    <button class="btn btn-primary btn-sm" title="Send">отправить</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

{{--                    ADD COMMENTS--}}
                    @Auth()
                    <div class="custombox clearfix">
                        <h4 class="small-title">Оставить комментарий</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="{{route('user.post.add_comment')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <textarea name="comment" class="form-control" placeholder="Комментарий"></textarea>
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else()
                        <div class="custombox clearfix">
                            <h4 class="small-title">Чтобы оставить комментарий <a href="{{route('login')}}">Войдите в аккаунт</a> или <a href="{{route('register')}}"> Зарегестрируйтесь</a> </h4>
                        </div>

                        @endauth

                    <hr class="invis1">

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
@section('scripts')
    <script>
        let is_liked
        $(document).ready(function () {
            let post_id = $('#saveLikeDislike').data('post')
            let like = $('[data-like]')
            let dislike = $('[data-dislike]')
            $.ajax({
                url: '{{url('check-likedislike')}}',
                type: 'post',
                datatype: 'json',
                data:{
                    post: post_id,
                    _token:"{{csrf_token()}}"
                },
                success:function (res) {
                    if(res.result == 'like'){
                        like.addClass('active').removeClass('btn');
                        is_liked = true
                        dislike.addClass('disabled');
                    }else if(res.result == 'dislike'){
                        dislike.addClass('active').removeClass('btn');
                        is_liked = true
                        like.addClass('disabled');
                    }
                }
            })
        })
        $(document).on('click', '#saveLikeDislike', function () {
            if(!is_liked){
                let _post = $(this).data('post');
                let _type = $(this).data('type');
                let vm = $(this);

                $.ajax({
                    url:'{{url('save-likedislike')}}',
                    type: 'post',
                    dataType: 'json',
                    data:{
                        post: _post,
                        type: _type,
                        _token:"{{csrf_token()}}"
                    },
                    beforeSend:function () {
                        vm.addClass('disabled');
                    },
                    success:function (res) {
                        if(res.bool == true){
                            vm.removeClass('disabled').addClass('active');
                            is_liked = true
                            vm.removeAttr('id');
                            let _prevCount = $('.'+_type+'-count').text();
                            _prevCount++;
                            $('.'+_type+'-count').text(_prevCount);
                        }
                    }
                })
            }

        })
    </script>
@endsection
