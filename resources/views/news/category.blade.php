@extends('layouts.app')

@section('title')
    @parent |
        @if(isset($category))
            {{ $category }}
        @else
            Категории
        @endif
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            {{ __('Новости из категории') }}
                            @isset($category)
                                {{ $category }}
                            @endisset
                        </h1>
                    </div>

                    <div class="card-body">
                        <ul class="nav flex-column newsList">

                            @forelse($news as $item)
                                <li class="nav-item mb-3 newsList__item">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h2 class="mb-0 me-2">{{ $item['title'] }}</h2>
                                        <img src="{{ $item['image'] }}" alt="" width="150">
                                    </div>
                                    <div class="d-flex justify-content-sm-between align-items-center">
                                        <a href="{{ route('news.show', $item['id']) }}" class="nav-link fs-5">Подробнее</a>
                                        <p class="mb-0 fst-italic text-end">{{ $item['created_at'] }}</p>
                                    </div>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <p>Нет новостей</p>
                                </li>
                            @endforelse

                        </ul>
                        <div class="mt-3">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


