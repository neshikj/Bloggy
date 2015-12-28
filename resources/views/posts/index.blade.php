@extends('layout.app')

@section('page-header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ URL::asset('img/home-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Bloggy</h1>
                    <hr class="small">
                    <span class="subheading">A Clean Blog Assignment</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

    @if (!$posts->count())
        <h2>There are no posts.</h2>
    @else
    @foreach ($posts as $post)
        <div class="post-preview">
            <a href="{{ action('PostsController@show', [$post->id]) }}">
                <h2 class="post-title">{{ $post->title }}</h2>
                <h3 class="post-subtitle">{{ $post->description }}</h3>
            </a>
            <p class="post-meta">Posted by {{ $post->user->name }}</p>
            <hr>
    @endforeach
        <ul class="pager">
            {!! $posts->render() !!}
        </ul>
    @endif
@stop