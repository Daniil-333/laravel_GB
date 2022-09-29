@extends('layouts.main')

@section('title')
    @parent | Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        <h1>Это агрегатор новостей</h1>

        <h2>Главная страница</h2>
    </div>
@endsection

