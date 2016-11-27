@extends('layouts.app')
@section('title', 'Editing User')

@section('content')
  {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}

      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
      {{ Form::label('email', 'Email') }}
      {{ Form::email('email', null, ['class' => 'form-control', 'required' => true]) }}

      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">
        {{Form::hidden('is_admin','0')}}
      {{ Form::checkbox('is_admin', '1', $user->is_admin) }}
      Is Admin
      </label>
    </div>

    <div class="form-group">
      <label for="">
        {{Form::hidden('is_editor','0')}}
      {{ Form::checkbox('is_editor', '1', $user->is_editor) }}
      Is Editor
      </label>
    </div>

    <div class="form-group">
      <label for="">
        {{Form::hidden('is_author','0')}}
      {{ Form::checkbox('is_author', '1', $user->is_author) }}
      Is Author
      </label>
    </div>





    <button type="submit" name="btn btn-default">Save</button>
  {{ Form::close() }}
@endsection
