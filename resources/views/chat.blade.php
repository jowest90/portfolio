<!-- resources/views/chat.blade.php -->

@extends('layouts.chatApp')

@section('content')
<div class="card">
    <div class="card-header">Users</div>
    <p><b>Chat Room:</b></p>
    <p>Desc: An application to send messages from one person to another</p>
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
