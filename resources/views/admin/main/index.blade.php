@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Главная</h1>
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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <h3>{{$posts ?? '0'}}</h3>
                <p>Количество постов</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              {{-- <a href="{{route('posts.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <h3>{{$register_user ?? '0'}}</h3>

                <p>Зарегистрированных пользователей</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              {{-- <a href="{{route('users.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                      <h3>{{$views ?? '0'}}</h3>
                <p>Просмотров</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              {{-- <a href="{{route('')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>

@endsection
