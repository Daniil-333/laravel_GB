@extends('layouts.app')

@section('title')
    @parent | О проекте
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>О проекте</h1>
                        <p>Это сайт - агрегатор новостей, пока не готов</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

