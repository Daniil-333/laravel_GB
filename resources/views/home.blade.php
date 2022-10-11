@extends('layouts.app')

@section('title')
    @parent | {{ config('app.name', 'Laravel') }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::check())
                <div class="card">
                    <div class="card-header"><h1>{{ __('Это агрегатор новостей') }}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header"><h1>{{ __('Вы не авторизованы!') }}</h1></div>

                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
