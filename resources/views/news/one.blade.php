@extends('layouts.main')

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
    <div>
        @if(!is_null($item))
            @if(!$item['isPrivate'])
                <h1>{{ $item['title'] }}</h1>
                <div>{{ $item['description'] }}</div>
            @else
                Зарегистрируйтесь для просмотра
            @endif
        @else
            Нет новости с таким ID
        @endif

    </div>
@endsection

