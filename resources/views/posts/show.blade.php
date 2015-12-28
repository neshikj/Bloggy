@extends('layout.app')

@section('page-header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ URL::asset('img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <span class="meta">Posted by {{ $post->user->name }}</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p>{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </article>
    <hr>
@stop