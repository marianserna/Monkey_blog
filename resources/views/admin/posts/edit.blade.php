@extends('layouts.app')
@section('title', 'Editing Post')

@section('content')
  @if (Auth::user()->is_editor && $post->status === 'submitted')
    <div class="row">
      <div class="col-sm-12">
        <a href="{{ route('admin.posts.publish', ['post' => $post->id]) }}" class="btn btn-success">Publish</a>
        <a href="{{ route('admin.posts.reject', ['post' => $post->id]) }}" class="btn btn-danger">Reject</a>
      </div>
    </div>
  @endif

  @if (Auth::user()->is_author && ($post->status === 'draft' || $post->status === 'rejected'))
    <div class="row">
      <div class="col-sm-12">
        <a href="{{ route('admin.posts.submit', ['post' => $post->id]) }}" class="btn btn-success">Submit</a>
        @if ($post->status === 'draft')
          <form style="display: inline" action="{{ route('admin.posts.destroy', $post->id)}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        @endif
      </div>
    </div>
  @endif

  <hr>

  {{ Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'put', 'files' => true]) }}
    @include('admin.posts.form')
  {{ Form::close() }}

@endsection
