@extends('layouts.app')

@section('title')
    @parent | Профили
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>CRUD Пользователей</h1>
            @forelse($users as $item)
                @if($item->name !== 'Admin')
                    <form action="{{ route('admin.users.destroy', $item) }}" method="post" class="mb-3">
                        <h3>{{ $item->name }}</h3>
                        <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-success">edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                @endif
            @empty
                <p>Нет пользователей</p>
            @endforelse
            <div>
                <div class="mb-3 mt-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-dark">Добавить пользователя</a>
                </div>
            </div>
            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
