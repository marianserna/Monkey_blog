@extends('layouts.app')
@section('title', 'Posts')

@section('content')
    <h1>Listing posts</h1>
    <ul>
      @foreach ($posts as $post)
        <li>
          <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
        </li>
      @endforeach
@endsection
