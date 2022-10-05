@extends('layouts.app')

@section('title')
    @parent | Главная
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>CRUD Новостей</h1>
            @forelse($news as $item)
                <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                    <h3>{{ $item->title }}</h3>
                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            @empty
                <p>Нет новостей</p>
            @endforelse
            <div class="mt-3">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
