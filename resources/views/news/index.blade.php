@extends('layouts.main')

@section('title')
    @parent | Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        <h1>Новости</h1>
        @forelse($news as $item)
            <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a><br><br>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
@endsection
