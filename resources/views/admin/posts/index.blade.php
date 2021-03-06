@extends('layouts.app')
@section('title', 'Users')

@section('content')
    <div class="container">
      <h1>Listing posts</h1>

      @if(Auth::user()->is_author)
        <a href="{{route('admin.posts.create')}}" class="btn btn-default">New Post</a>
      @endif

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
    </div>
@endsection
