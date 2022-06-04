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
<chat-log :messages="messages"></chat-log>
<div class="col-md-8 col-md-2">
<chat-composer v-on:messagesent="addMessage"></chat-composer>
</div>
</div>
