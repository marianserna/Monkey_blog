@extends('layouts.app')
@section('title', 'Posts')

@section('content')
    <h1>Listing users</h1>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Is Admin</th>
        <th>Is Editor</th>
        <th>Is Author</th>
        <th>Actions</th>
      </tr>
      @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->is_admin ? 'Yes' : 'No'}}</td>
          <td>{{$user->is_editor ? 'Yes' : 'No'}}</td>
          <td>{{$user->is_author ? 'Yes' : 'No'}}</td>
          <td>
              <a href="{{route('admin.users.edit', ['user' => $user])}}" class="btn btn-default">
                Edit
              </a>
          </td>
        </tr>
      @endforeach
    </table>
@endsection
