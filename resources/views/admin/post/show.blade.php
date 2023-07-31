@extends('admin.main.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="d-flex justify-content-center">
                    <a href="{{route('posts.edit', $post->id)}}"><button class="btn btn-success" style="font-size: 16px;">Редактировать</button></a>
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent ml-2">
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Посты</a></li>
                        <li class="breadcrumb-item active">Просмотр поста</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{$post->id}}</td>
                                </tr>
                                <tr>
                                    <th>Название</th>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <th>Описание</th>
                                    <td style="white-space: pre-wrap">{{$post->desc}}</td>
                                </tr>
                                <tr>
                                    <th>Категория</th>
                                    <td>{{$post->category['title']}}</td>
                                </tr>
                                <tr>
                                    <th>Тэги</th>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            {{$tag['title']}},
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Превью</th>
                                    <td>
                                        <img src="{{Storage::url($post->preview_image)}}" width="900" height="450">
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>



            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>

@endsection
