@extends('layouts.app')

@section('title')
    @parent | CRUD Категорий
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="mb-4">CRUD Категорий</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @forelse($categories as $item)
                <form action="{{ route('admin.category.destroy', $item) }}" method="post" class="mb-4">
                    <h3>{{ $item->title }}</h3>
                    <a href="{{ route('admin.category.edit', $item) }}" class="btn btn-success">edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            @empty
                <p>Нет категорий</p>
            @endforelse
            <div>
                <a href="{{ route('admin.category.create') }}" class="btn btn-dark">Добавить категрию</a>
            </div>
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
