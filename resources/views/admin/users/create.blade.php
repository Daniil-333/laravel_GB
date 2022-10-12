@extends('layouts.app')

@section('title')
    @parent | Добавление пользователя
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Страница добавления пользователя</h1>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="form-group col-md-8 mb-4">
                                <label for="username" class="mb-2">{{ __('Имя пользователя') }}</label>

                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('name') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="">
                                    <input id="username" type="text" class="form-control"  name="name" value="{{ old('name') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-md-8 mb-4">
                                <label for="emailUser" class="mb-2">{{ __('E-mail') }}</label>

                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('email') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif

                                <div class="">
                                    <input id="emailUser" type="email" class="form-control"  name="email" value="{{ old('email')}}" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-md-8 mb-4">
                                <label for="passwUser" class="mb-2">{{ __('Пароль') }}</label>

                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('password') as $error)
                                            {{ $error }}<br>
                                        @endforeach

                                    </div>
                                @endif

                                <div class="">
                                    <input id="passwUser" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group col-md-8 mb-4">
                                <label for="passwUser-confirm" class="mb-2">{{ __('Подтвердите пароль') }}</label>

                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('password_confirmation') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="">
                                    <input id="passwUser-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group col-md-8 mb-4">
                                <div class="form-check">

                                    @if ($errors->has('isAdmin'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('isAdmin') as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </div>
                                    @endif

                                    <input class="form-check-input" type="checkbox" name="isAdmin" id="isAdmin"
                                           @if (old('isAdmin')) checked @endif>

                                    <label class="form-check-label" for="isAdmin">
                                        {{ __('Админ?') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-8">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Добавить пользователя') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
