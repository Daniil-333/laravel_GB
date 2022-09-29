@extends('layouts.admin')

@section('title')
    @parent | test2
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
                        <h1>{{ __('Страница test2') }}</h1>
                    </div>

                    <div class="card-body">
                        {{ __('any some text 2') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
