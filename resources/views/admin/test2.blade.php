@extends('layouts.app')

@section('title')
    @parent | test2
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Выберите категорию новости') }}</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.test2') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="categoryNews" class="col-md-4 col-form-label text-md-end">{{ __('Категория новости') }}</label>

                                <div class="col-md-6">
                                    <select name="category" id="categoryNews" class="form-select">
                                        @forelse($categories as $item)
                                            <option value="{{ $item['id'] }}">
                                                {{ $item['title'] }}
                                            </option>
                                        @empty
                                            <option value="0">Нет категорий</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input id="isJson" class="form-check-input" type="radio" name="typeData" value="json">

                                        <label class="form-check-label" for="isJson">
                                            {{ __('Скачать в json') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input id="isExcel" class="form-check-input" type="radio" name="typeData" value="excel">

                                        <label class="form-check-label" for="isExcel">
                                            {{ __('Скачать в excel') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Скачать новости') }}
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
