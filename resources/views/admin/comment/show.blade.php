@extends('admin.main.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.comments.index')}}">Комментарии</a></li>
                        <li class="breadcrumb-item active">Просмотр комментариев пользователя</li>
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
                                <thead>
                                    <tr>
                                        <th>Пост</th>
                                        <th>Комментарий</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td><a href='{{route('user.post', $comment->post->id)}}'>{{ mb_substr($comment->post->title, 0, 50) }}</a></td>
                                            <td style="white-space: pre-wrap">{{ $comment->comment }}</td>
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

                        <hr>

                        <div class="card-body table-responsive p-0 mt-5">
                            <h4 class='text-center'>Удаленные комментарии</h4>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Пост</th>
                                        <th>Комментарий</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td><a href='{{route('user.post', $comment->post->id)}}'>{{ mb_substr($comment->post->title, 0, 50) }}</a></td>
                                            <td style="white-space: pre-wrap">{{ $comment->comment }}</td>
                                            <td>
                                                <a href='{{route('admin.comments.delete', $comment->id)}}'>
                                                    <i class="fas fa-trash text-success" role="button"></i>
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



            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>

@endsection
