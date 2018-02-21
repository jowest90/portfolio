@extends('layouts.userLayout')

@section('content')
<h1>ChatRoom</h1>
<div class="container">
  <div class="col-md-2">
    <div id="app">
      <example-component></example-component>
      <ul class="list-group">
      @foreach($users as $chatuser)
          <li v-on:click="getUserId" class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</li>
      @endforeach
    </ul>
    </div>
    <script src="/js/app.js" charset="utf-8"></script>
  </div>
</div>
@endsection
