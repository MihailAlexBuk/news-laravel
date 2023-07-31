@extends('admin.main.index')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Статьи, посты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-2 mb-3">
                    <a href="{{route('posts.create')}}" class="btn btn-block btn-primary">Добавить</a>
                </div>
                <div class="col-4 mb-3">
                    <form class="d-flex" action="{{route('admin.posts.search')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control ml-1" name="search" id="exampleInputEmail1" placeholder="Поиск...">
                        <input type="submit" class="btn btn-primary ml-2" value="Поиск">
                    </form>
                    @error('search')
                    <div class="alert alert-danger mt-1 mb-1 ">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th colspan="3">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->category->title}}</td>
                                        <td><a href="{{route('posts.show', $post->id)}}"><i class="far fa-eye"></i></a></td>
                                        <td><a href="{{route('posts.edit', $post->id)}}"><i class="fas fa-pencil-alt text-success"></i></a></td>
                                        <td>
                                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
        <div style="margin: 30px 400px">
            {{$posts->links()}}
        </div><!-- /.container-fluid -->
    </section>

@endsection
