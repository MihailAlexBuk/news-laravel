@extends('admin.main.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <a class='btn btn-success' href="{{route('admin.mail.read', $mail->id)}}">Прочитано</a>
                    @if($mail->spam == 1)
                    <a class='btn btn-warning ml-4' href="{{route('admin.mail.return_from_spam', $mail->id)}}">Вернуть со Спама</a>
                    @else
                    <a class='btn btn-warning ml-4' href="{{route('admin.mail.spam', $mail->id)}}">Спам</a>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.mail')}}">Письма</a></li>
                        <li class="breadcrumb-item active">Письмо №{{$mail->id}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container py-5">

            <div class="row">
              <div class="col-md-12 col-lg-12 col-xl-12">

                <ul class="list-unstyled">

                <li class="d-flex justify-content-between mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-3">
                        <p class="fw-bold mb-0">{{$mail->name}}</p>
                        <p class="fw-bold mb-0 mx-2">{{$mail->email}}</p>
                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{$mail->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="card-body">
                        <p class="mb-0">
                            {{$mail->message}}
                        </p>
                        </div>
                    </div>
                </li>

                @if($mail->answer)
                    <li class="d-flex justify-content-end mb-4">
                        <div class="card">
                            <div class="card-body">
                            <p class="mb-0"  style='background-color:rgb(135, 241, 141)'>
                                {{$mail->answer}}
                            </p>
                            </div>
                        </div>
                    </li>
                @endif

                  <li class="bg-white mb-3">
                    <div class="form-outline">
                        <form action="{{route('admin.mail.answer', $mail->id)}}" method="POST">
                            @csrf
                            @error('answer')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label class="form-label" for="textAreaExample2">Ответить</label>
                            <textarea name='answer' class="form-control" id="textAreaExample2" rows="4"></textarea>
                            <button type="submit" class="btn btn-info btn-rounded float-end mt-2">Отправить</button>
                        </form>
                    </div>
                  </li>
                </ul>

              </div>

            </div>

          </div>
    </section>

@endsection
