@extends('layouts.app')

@section('title')
    @parent | Главная
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>Админка Главная</h1>
            <p>Какой-то контент</p>
        </div>
    </div>
@endsection
