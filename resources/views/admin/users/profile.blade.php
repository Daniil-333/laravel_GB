@extends('layouts.app')

@section('title')
    @parent | Изменение профиля
@endsection

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Изменение профиля</h1>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя пользователя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('name') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Текущий пароль</label>

                                <div class="col-md-6">
{{--                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('password') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif--}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="12345678" required autocomplete="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="passwordNew" class="col-md-4 col-form-label text-md-right">Новый пароль</label>

                                <div class="col-md-6">

                                    <input id="passwordNew" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" value="" required autocomplete="newPassword">

                                    @error('newPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль</label>

                                <div class="col-md-6">

                                    <input id="password-confirm" type="password" class="form-control @error('newPassword_confirmation') is-invalid @enderror" name="newPassword_confirmation" value="" required autocomplete="newPassword_confirmation">

                                    @error('newPassword_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="form-check">

                                    @if ($errors->has('isAdmin'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('isAdmin') as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </div>
                                    @endif

                                    <input class="form-check-input" type="checkbox" name="isAdmin" id="isAdmin"
                                           @if ($user->is_admin == 1 || old('isAdmin')) checked @endif>

                                    <label class="form-check-label" for="isAdmin">
                                        {{ __('Админ?') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Изменить профиль
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
