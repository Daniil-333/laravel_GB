@extends('layouts.main')

@section('title')
    @parent | Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        <h1>Категории новостей</h1>
        @forelse($category as $item)
            <a href="{{ route('news.category.show', $item['slug']) }}">{{ $item['title'] }}</a><br><br>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
@endsection
