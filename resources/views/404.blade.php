@extends('layouts.app')

@section('title')
    @parent | 404
@endsection

@section('content')

    <div class="page404">
        <div class="container">
            <div class="row">
                <h1 class="fw-bold text-decoration-underline">Custom page 404</h1>

                <div class="col-md-6">
                    <a href="{{ route('home') }}" class="page404__link"><img src="http://www.limpfish.com/notfound.gif" width=348 height=378></a>
                </div>
            </div>
        </div>
    </div>

@endsection

