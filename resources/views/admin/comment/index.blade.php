@extends('admin.main.index')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
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
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Пользователь</th>
                                    <th>Пост</th>
                                    <th>Комментарий</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td><a href='{{route('admin.comments.user.show', $comment->user->id)}}'>{{ mb_substr($comment->user->email, 0, 50) }}</a></td>
                                        <td><a href='{{route('user.post', $comment->post->id)}}'>{{ mb_substr($comment->post->title, 0, 30) }}</a></td>
                                        <td>{{ mb_substr($comment->comment, 0, 30) }}</td>
                                        <td>
                                            <a href='{{route('admin.comments.delete', $comment->id)}}'>
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </a>
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
            <div style="margin: 30px 400px">
                {{$comments->links()}}
            </div>

            <!-- ./col -->
        </div>
        <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

@endsection
