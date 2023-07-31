@extends('user.layouts.main')

@section('content')
    <section id="content-wrap" class="blog-single">
        <div class="row">
            <div class="col-twelve">
                <article class="format-standard">
                    <div class="content-media">
                        <div class="post-thumb">
{{--                            <img src="https://picsum.photos/id/237/900/450">--}}
                            <img src="{{ Storage::url($img) }}">
                        </div>
                    </div>
                    <div class="primary-content">
                        <h1 class="page-title">{{$data['title']}}</h1>
                        <ul class="entry-meta">
                            <li class="date">September 06, 2016</li>
                            <li class="cat"><a href="">Category</a></li>
                        </ul>
                        <p>{!! ($data['desc']) !!}</p>
                        <p class="tags">
                            <span>Tagged in :</span>
                            <a href="#">Tags1</a>
                            <a href="#">Tags2</a>
                            <a href="#">Tags3</a>
                        </p>
                    </div>
                </article>
                <div>
                    <a href="javascript:history.back()" class="btn btn-primary">Вернутся</a>
                    <div>
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <input type="hidden" name="data" value="{{ json_encode($data,TRUE)}}">
                            <button type="submit" class="btn btn-success">
                                Продолжить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
