@extends('layouts.main')

@section('title')
    @parent | 404
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div>
    <h1>Custom 404</h1>

</div>
@endsection

