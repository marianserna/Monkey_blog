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
      </div>
    </div>
  @endif

  <hr>

  {{ Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'put']) }}
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null, ['class' => 'form-control', 'required' => true]) }}

      @if ($errors->has('title'))
          <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
      {{ Form::label('summary', 'Summary') }}
      {{ Form::text('summary', null, ['class' => 'form-control', 'required' => true]) }}

      @if ($errors->has('summary'))
          <span class="help-block">
              <strong>{{ $errors->first('summary') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
      {{ Form::label('body', 'Body') }}
      {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => true]) }}

      @if ($errors->has('body'))
          <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
          </span>
      @endif
    </div>


    <button type="submit" title="btn btn-default">Save</button>
  {{ Form::close() }}
@endsection
