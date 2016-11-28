@extends('layouts.app')
@section('title', 'Monkey Blog')
@section('page-class', 'home')

@section('content')
  <header>
    <div class="background-image"></div>
    <div class="logo-container">
      <img src="/images/monkey.svg" class="animated bounceInDown">
      <h1 class="animated zoomIn">MONKEY MAGAZINE</h1>
    </div>

  </header>

  @include('posts.latest')
@endsection
