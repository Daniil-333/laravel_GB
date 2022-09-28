@extends('layouts.main')

@section('title')
    @parent |
        @if(isset($category))
            {{ $category['title'] }}
        @else
            Категории
        @endif
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        <h1>Новости из категории
            @isset($category)
                {{ $category['title'] }}
            @endisset
        </h1>

        @forelse($news as $item)
            <div>
                <h2>{{ $item['title'] }}</h2>
                @if(!$item['isPrivate'])
                    <a href="{{ route('news.show', $item['id']) }}">Подробнее</a><br><br>
                @endif
            </div>
        @empty
            <p>Нет новостей</p>
        @endforelse

    </div>
@endsection


