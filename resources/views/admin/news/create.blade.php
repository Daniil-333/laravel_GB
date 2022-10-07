@extends('layouts.app')

@section('title')
    @parent | Добавление новости
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="text-center mb-3">Страница добавления новости</h1>
            <div class="col-md-8">
                <form action="@if(!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($news->id) @method('PUT') @endif
                    <div class="row mb-3">
                        <label for="nameNews" class="col-md-4 col-form-label text-md-end">{{ __('Название новости') }}</label>

                        <div class="col-md-6">
                            <input id="nameNews" type="text" class="form-control"  name="title" value="{{ old('title') ?? $news->title }}" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="categoryNews" class="col-md-4 col-form-label text-md-end">{{ __('Категория новости') }}</label>

                        <div class="col-md-6">
                            <select name="category_id" id="categoryNews" class="form-select">
                                @forelse($categories as $item)
                                    <option value="{{ $item->id }}"
                                            @if ($item->id == old('category_id') || $item->id == $news->category_id) selected @endif>
                                        {{ $item->title }}
                                    </option>
                                @empty
                                    <option value="0">Нет категорий</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="desc" class="col-md-4 col-form-label text-md-end">{{ __('Описание') }}</label>

                        <div class="col-md-6">
                            <textarea id="desc" class="form-control" name="description">{{ old('description') ?? $news->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="picture" class="col-md-4 col-form-label text-md-end">{{ __('Изображение') }}</label>

                        <div class="col-md-6">
                            <input id="picture" type="file" name="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="isPrivate" id="isPrvate"
                                    @if ($news->isPrivate == 1 || old('isPrivate')) checked @endif>

                                <label class="form-check-label" for="isPrvate">
                                    {{ __('Новость приватная?') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @if($news->id)
                                    {{ __('Изменить новость') }}
                                @else
                                    {{ __('Добавить новость') }}
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
