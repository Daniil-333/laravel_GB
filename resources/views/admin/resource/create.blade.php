@extends('layouts.app')

@section('title')
    @parent | Добавление ресурса
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="text-center mb-4">Страница добавления ресурса</h1>
            <div class="col-md-8">
                <form action="@if(!$resource->id){{ route('admin.resource.store') }}@else{{ route('admin.resource.update', $resource) }}@endif" method="POST">
                    @csrf
                    @if($resource->id) @method('PUT') @endif

                    <div class="form-group col-md-8 mb-4">
                        <label for="nameResource" class="mb-2">{{ __('Название ресурса') }}</label>

                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <div class="">
                            <input id="nameResource" type="text" class="form-control" name="title" value="{{ old('title') ?? $resource->title }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-4">
                        <label for="urlResource" class="mb-2">{{ __('URL ресурса') }}</label>

                        @if ($errors->has('url'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('url') as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <div class="">
                            <input id="urlResource" type="url" class="form-control" name="url" value="{{ old('url') ?? $resource->url }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-4">
                        <button type="submit" class="btn btn-primary">
                            @if($resource->id)
                                {{ __('Изменить ресурс') }}
                            @else
                                {{ __('Добавить ресурс') }}
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
