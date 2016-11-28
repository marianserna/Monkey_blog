@extends('layouts.app')
@section('title', $post->title)
@section('page-class', 'posts-show')

@section('content')
    <div class="container post-header">
      <h1>{{$post->title}}</h1>
      <h2>{{$post->summary}}</h2>
      <p>{{$post->user->name}} &smashp; {{date('F j, Y', strtotime($post->created_at))}}</p>
    </div>

    <div class="post-hero-image" style="background-image: url('{{$post->image->url('hero')}}')"></div>

    <div class="container post-body">
      {{$post->body}}
    </div>

    @include('posts.latest')

@endsection
