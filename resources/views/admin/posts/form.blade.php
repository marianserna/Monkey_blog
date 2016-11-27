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

@if ($post->image_file_name)
  <div class="form-group">
    <img src="{{$post->image->url('medium')}}"/>
  </div>
@endif

<div class="form-group">
  {{ Form::label('image', 'Image') }}
  {{ Form::file('image') }}
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
<a href="{{ route('admin.posts.index') }}">Cancel</a>
