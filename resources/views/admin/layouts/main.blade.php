<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <p class="animation__snake">Admin</p>
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a href="/" class='btn btn-outline-primary' type="submit">Вернуться</a>
        </li>
        @auth
            <li class="nav-item ml-2">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input class='btn btn-outline-danger' type="submit" value="Выйти">
                </form>
            </li>
        @endauth

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{route('admin.index')}}" class="brand-link">
          <span class="brand-text font-weight-light">Admin</span>
      </a>
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="{{route('posts.index')}}" class="nav-link">
                          <i class="nav-icon fas  fa-list-alt"></i>
                          <p>Посты</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('posts_preview.index')}}" class="nav-link">
                          <i class="nav-icon fas  fa-list-alt"></i>
                          <p>Посты-парсер</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.mail')}}" class="nav-link">
                        <i class="nav-icon fas  fa-envelope"></i>
                        <p>Почта</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.comments.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-comment"></i>
                          <p>Комментарии</p>
                      </a>
                  </li>
                  {{-- <li class="nav-item">
                      <a href="{{route('admin.likes.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-heart"></i>
                          <p>Лайки</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-eye"></i>
                          <p>Просмотры</p>
                      </a>
                  </li> --}}
                  <li class="nav-item">
                      <a href="{{route('categories.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-list"></i>
                          <p>Категории</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('tags.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-tag"></i>
                          <p>Тэги</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('users.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>Пользователи</p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>

  </aside>

  <div class="content-wrapper">
    @yield('content')
  </div>

</div>
<!-- ./wrapper -->

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#summernote').summernote({
      toolbar:[
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
      ],
        tabDisable: true
    });

    $('.select2').select2()


    $(function () {
      bsCustomFileInput.init();
    });
  });
</script>

</body>
</html>
