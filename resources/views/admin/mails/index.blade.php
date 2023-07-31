@extends('admin.main.index')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Почта</h1>
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
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th colspan="2">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mails as $mail)
                                    @if($mail->read == 0)
                                        <tr style='background-color:rgba(177, 255, 99, 0.8)'>
                                            <td>{{$mail->name}}</td>
                                            <td>{{$mail->email}}</td>
                                            <td><a href="{{route('admin.mail.show', $mail->id)}}" title='Ответить'><i class="fa fa-reply text-success"></i></a></td>
                                            <td><a href="{{route('admin.mail.spam', $mail->id)}}" title='Spam'><i class="fa fa-window-close text-danger"></i></a></td>
                                        </tr>
                                    @elseif($mail->spam == 1)
                                        <tr style='background-color:rgba(248, 248, 97, 0.8)'>
                                            <td>{{$mail->name}}</td>
                                            <td>{{$mail->email}}</td>
                                            <td><a href="{{route('admin.mail.show', $mail->id)}}" title='Ответить'><i class="fa fa-reply text-success"></i></a></td>
                                            <td><a href="{{route('admin.mail.return_from_spam', $mail->id)}}" title='Return from spam'><i class="fa fa-window-close text-success"></i></a></td>
                                        </tr>
                                    @else
                                        <tr style='background-color:rgba(124, 255, 255, 0.8)'>
                                            <td>{{$mail->name}}</td>
                                            <td>{{$mail->email}}</td>
                                            <td><a href="{{route('admin.mail.show', $mail->id)}}" title='Ответить'><i class="fa fa-reply text-success"></i></a></td>
                                            <td><a href="{{route('admin.mail.spam', $mail->id)}}" title='Spam'><i class="fa fa-window-close text-danger"></i></a></td>
                                        </tr>
                                    @endif
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
                {{$mails->links()}}
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
