@extends('layouts.app')
@section('title', 'New Post')

@section('content')
  {{ Form::model($post, ['route' => 'admin.posts.store', 'method' => 'post', 'files' => true]) }}
    @include('admin.posts.form')
  {{ Form::close() }}
@endsection
