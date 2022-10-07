@extends('layouts.app')

@section('title')
    @parent | Добавление категории
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="text-center mb-4">Страница добавления категории</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-8">
                <form action="@if(!$category->id){{ route('admin.category.store') }}@else{{ route('admin.category.update', $category) }}@endif" method="POST">
                    @csrf
                    @if($category->id) @method('PUT') @endif
                    <div class="row mb-3">
                        <label for="nameCategory" class="col-md-4 col-form-label text-md-end">{{ __('Название категории') }}</label>

                        <div class="col-md-6">
                            <input id="nameCategory" type="text" class="form-control"  name="title" value="{{ old('title') ?? $category->title }}" autofocus>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @if($category->id)
                                    {{ __('Изменить категорию') }}
                                @else
                                    {{ __('Добавить категорию') }}
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
