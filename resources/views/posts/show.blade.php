


@extends('layouts.app')

@section('content')

<h1>{{ $posts->title }}</h1>
<div>
    {{ $posts->body }}
</div>

@include('posts.comments.comment')

@endsection
