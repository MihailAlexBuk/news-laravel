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
                        <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Посты</a></li>
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

                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Наимановение</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Описание</label>
                        <textarea name="desc" id="summernote" >{{$post->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Текущее изображение</label>
                        <img width="900" height="450" src="{{ Storage::url($post->preview_image) }}">
                        <label class="mt-3">Добавить новое изображение</label>
                        <div class="w-50 mx-2">
{{--                            <img src="{{ Storage::url( $post->post_image_1) }}" alt="preview_image" class="w-50">--}}
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="post_image_1">
                                <label class="custom-file-label">Выберете изображение</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Изменить категорию</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == $post->category->id ? 'selected':''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Изменить тэги</label>
                        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>

            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
