@extends('layouts.admin')

@section('title')
    @parent | Добавление новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="text-center mb-3">Страница добавления новости</h1>
            <div class="col-md-8">
                <form method="POST" action="#">
                    @csrf

                    <div class="row mb-3">
                        <label for="nameNews" class="col-md-4 col-form-label text-md-end">{{ __('Название новости') }}</label>

                        <div class="col-md-6">
                            <input id="nameNews" type="text" class="form-control"  name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="longDesc" class="col-md-4 col-form-label text-md-end">{{ __('Подробное описание') }}</label>

                        <div class="col-md-6">
                            <textarea id="longDesc" class="form-control" name="long_desc" required>{{ old('long_desc') }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="shortDesc" class="col-md-4 col-form-label text-md-end">{{ __('Краткое описание') }}</label>

                        <div class="col-md-6">
                            <textarea id="shortDesc" class="form-control" name="short_desc" required>{{ old('short_desc') }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Новость приватная?') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Добавить новость') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
