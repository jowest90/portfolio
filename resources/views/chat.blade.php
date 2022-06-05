@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-2">
    <ul class="list-group">
    @foreach($users as $chatuser)
        <li class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</li>
    @endforeach
  </ul>
  </div>
  <div class="col-md-8 col-md-2">
      <div class="panel panel-default">
  <div class="panel-heading">Chat Room</div>
</div>
</div>
<div id="app">
     <main-component :user="{{ auth()->user() }}" logout-route="{{ route('logout') }}"></main-component>
</div>
</div>

@endsection
