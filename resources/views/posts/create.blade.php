@extends('layout.app')

@section('page-header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ URL::asset('img/contact-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>Try to create something cool as the animal behind.</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <h3>Create new blog post</h3><br />
    <div class="form-group">
        <input required="required" placeholder="Enter title here" type="text" name="title" class="form-control" />
    </div>
    <div class="form-group">
        <textarea name="description" class="form-control" placeholder="Enter body here"></textarea>
    </div>
    <input type="submit" name='publish' class="btn btn-success" value = "Publish" />

    <p id="errors" class="hidden" style="padding-top: 25px; color: red;">An error has occurred</p>
    <p class="success hidden" style="padding-top: 25px;">Your blog post is published.</p>
@endsection
