@extends('admin.main.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('posts_preview.index')}}">Посты-парсеры</a></li>
                        <li class="breadcrumb-item active">Редактирование поста</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content col-7">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{route('posts_preview.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название статьи</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Описание</label>
                        <textarea name="desc" id="summernote" >{{$post->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Текущее изображение</label>
                        <img width="900" height="450" src="{{ $post->preview_image }}">

                        <label class="mt-3">Добавить другое изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Выберете изображение</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Изменить категорию</label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value="{{$post->category}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Добавить">
                    </div>
                </form>
                <form action="{{route('posts_preview.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 bg-transparent">
                        <input type="submit" class="btn btn-danger" value="Удалить">
                    </button>
                </form>

            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
