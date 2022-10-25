@extends('layouts.app')

@section('title')
    @parent | Ресурсы
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>CRUD Ресурсов</h1>
            @forelse($resources as $item)
                <form action="{{ route('admin.resource.destroy', $item) }}" method="post" class="mb-3">
                    <h3>{{ $item->title }}</h3>
                    <a href="{{ route('admin.resource.edit', $item) }}" class="btn btn-success">edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            @empty
                <p>Нет ресурсов</p>
            @endforelse
            <div>
                <div class="mb-3 mt-3">
                    <a href="{{ route('admin.resource.create') }}" class="btn btn-dark">Добавить ресурс</a>
                </div>
            </div>
            <div class="mt-3">
                {{ $resources->links() }}
            </div>
        </div>
    </div>
@endsection
