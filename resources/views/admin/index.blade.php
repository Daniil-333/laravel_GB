@extends('layouts.admin')

@section('title')
    @parent | Главная
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div>
        <h1>Админка</h1>

        <p>Какой-то контент</p>
    </div>
@endsection
