<!-- resources/views/chat.blade.php -->

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
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
            <chat-messages :messages="messages"></chat-messages>
        </div>
        <div class="card-footer">
            <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        </div>
    </div>
</div>
@endsection
