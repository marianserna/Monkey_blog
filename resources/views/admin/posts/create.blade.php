@extends('layouts.app')
@section('title', 'New Post')

@section('content')
  <div class="container">
    {{ Form::model($post, ['route' => 'admin.posts.store', 'method' => 'post', 'files' => true]) }}
      @include('admin.posts.form')
    {{ Form::close() }}
  </div>
@endsection
