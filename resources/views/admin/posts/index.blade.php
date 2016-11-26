@extends('layouts.app')
@section('title', 'Users')

@section('content')
    <h1>Listing posts</h1>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
      @foreach ($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->status}}</td>
          <td>
              <a href="{{route('admin.posts.edit', ['post' => $post])}}" class="btn btn-default">
                Edit
              </a>
              
          </td>
        </tr>
      @endforeach
    </table>
@endsection
