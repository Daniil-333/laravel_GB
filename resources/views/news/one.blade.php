@extends('layouts.app')

@section('title')
    @parent |
        @if(isset($item))
            {{ $item['title'] }}
        @else
            Новости
        @endif
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(!is_null($item))
                    @if(!$item['isPrivate'] || Auth::id())
                        <div class="card">
                            <div class="card-header">
                                <h1>{{ $item['title'] }}</h1>
                            </div>
                            <div>
                                <img src="{{ $item['image'] ?? asset('storage/img/default.jpg') }}" alt="">
                            </div>
                            <div class="card-body">
                                <div>
                                    {!! $item['description'] !!}
                                </div>
                                <p class="mb-0 fst-italic text-end">{{ $item['created_at'] }}</p>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header">
                                <h1>{{ __('Зарегистрируйтесь для просмотра') }}</h1>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="card">
                        <div class="card-header">
                            <h1>{{ __('Нет новости с таким ID') }}</h1>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

