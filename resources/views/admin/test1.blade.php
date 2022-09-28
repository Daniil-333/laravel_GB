@extends('layouts.admin')

@section('title')
    @parent | test1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Страница test1</h1>

@endsection
