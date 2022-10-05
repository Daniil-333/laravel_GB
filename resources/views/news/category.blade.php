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
                                    <h2 class="mb-0">{{ $item['title'] }}</h2>
                                    @if(!$item['isPrivate'])
                                        <a href="{{ route('news.show', $item['id']) }}" class="nav-link">Подробнее</a>
                                    @endif
                                </li>
                            @empty
                                <li class="nav-item">
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


