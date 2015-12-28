@extends('layout.app')

@section('page-header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ URL::asset('img/about-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>Register yourself.</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<form method="POST" action="/auth/register" class="form-auth">
    {!! csrf_field() !!}

    <div>
        Name
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div>
        Password
        <input type="password" name="password" class="form-control">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
    </div>
    <br />
    <div style="color: red; padding-top:20px;">
        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
    </div>
</form>
@endsection