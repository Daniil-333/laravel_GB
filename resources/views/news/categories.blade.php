@extends('layouts.app')

@section('title')
    @parent | Новости
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Категории новостей') }}</h1>
                    </div>

                    <div class="card-body">
                        <ul class="nav flex-column">

                            @forelse($category as $item)
                                <li class="nav-item">
                                    <a href="{{ route('news.category.show', $item['slug']) }}" class="nav-link">{{ $item['title'] }}</a>
                                </li>
                            @empty
                                <li>
                                    <p>Нет новостей</p>
                                </li>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
