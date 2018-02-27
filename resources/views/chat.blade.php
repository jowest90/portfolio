@extends('layouts.userLayout')

@section('content')
<div class="container">
  <div class="col-md-2">
    <ul class="list-group">
    @foreach($users as $chatuser)
        <li v-on:click="getUserId" class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</li>
    @endforeach
  </ul>
  </div>
  <div class="col-md-8 col-md-2">
      <div class="panel panel-default">
  <div class="panel-heading">Chat Room</div>
</div>
</div>
  <!-- <example-component></example-component> -->
  <chat-message></chat-message>
  <chat-log></chat-log>
  <chat-composer></chat-composer>
</div>
@endsection
