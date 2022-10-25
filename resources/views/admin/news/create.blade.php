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
                    <div class="form-group col-md-8 mb-4">
                        <label for="nameNews" class="mb-2">{{ __('Название новости') }}</label>

                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <div class="">
                            <input id="nameNews" type="text" class="form-control"  name="title" value="{{ old('title') ?? $news->title }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-4">
                        <label for="categoryNews" class="mb-2">{{ __('Категория новости') }}</label>

                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger col-md-6" role="alert">
                                @foreach ($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        <div class="">
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

                    <div class="form-group col-md-8 mb-4">
                        <label for="descNews" class="mb-2">{{ __('Описание') }}</label>

                        @if ($errors->has('description'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('description') as $error)
                                    {{ $error }}<br>
                                @endforeach

                            </div>
                        @endif

                        <div class="">
                            <textarea id="descNews" class="form-control" name="description">{!! old('description') ?? $news->description !!} </textarea>

{{--                            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                            <script>
                                var options = {
                                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                };
                            </script>
                            <script>
                                CKEDITOR.replace('descNews', options);
                            </script>--}}
                        </div>

                    </div>

                    <div class="form-group col-md-8 mb-4">
                        <label for="picture" class="mb-2">{{ __('Изображение') }}</label>

                        @if ($errors->has('image'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('image') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        <div class="">
                            <input id="picture" type="file" name="image">
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-4">
                        <div class="form-check">

                            @if ($errors->has('isPrivate'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('isPrivate') as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            <input class="form-check-input" type="checkbox" name="isPrivate" id="isPrvate"
                                @if ($news->isPrivate == 1 || old('isPrivate')) checked @endif>

                            <label class="form-check-label" for="isPrvate">
                                {{ __('Новость приватная?') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary">
                            @if($news->id)
                                {{ __('Изменить новость') }}
                            @else
                                {{ __('Добавить новость') }}
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
