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
                    <div class="form-group col-md-8 mb-4">
                        <label for="nameCategory" class="mb-2">{{ __('Название категории') }}</label>

                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <div class="">
                            <input id="nameCategory" type="text" class="form-control"  name="title" value="{{ old('title') ?? $category->title }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-4">
                        <button type="submit" class="btn btn-primary">
                            @if($category->id)
                                {{ __('Изменить категорию') }}
                            @else
                                {{ __('Добавить категорию') }}
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
