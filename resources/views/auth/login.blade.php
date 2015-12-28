@extends('layout.app')

@section('page-header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ URL::asset('img/about-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>Please login.</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <form method="POST" action="/auth/login" class="form-auth">
        {!! csrf_field() !!}

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div>
            Password
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div>
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        </div>
    </form>

@endsection