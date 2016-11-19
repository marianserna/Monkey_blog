@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <h1>{{$post->title}}</h1>
    <h2>{{$post->summary}}</h2>
    <div>
      {{$post->body}}
    </div>
@endsection
