@extends('layouts.admin')

@section('title')
    @parent | test2
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Страница test2</h1>

@endsection
