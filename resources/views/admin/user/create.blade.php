@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">Зарегестрировать пользователя</div>

                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="POST" class="col-12">
                            @csrf
                            <div class="form-group">
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="name" placeholder="Имя">
                            </div>

                            <div class="form-group">
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                @error('password')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <input type="password" class="form-control" name="password" placeholder="Пароль">
                            </div>
                            <div class="form-group">
                                @error('password_confirmation')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}" {{ $id == old('role_id') ? 'selected':''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group text-center ">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
