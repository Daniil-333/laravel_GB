@extends('layouts.app')

@section('title')
    @parent | test1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Страница test1') }}</h1>
                    </div>

                    <div class="card-body">
                        {{ __('any some text') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
