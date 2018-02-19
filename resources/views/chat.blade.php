@extends('layouts.forum')
@section('content')
<div class="row">
    <div class="col-md-2">
        <ul class="list-group">
        @foreach($users as $chatuser)
            <li v-on:click="getUserId" class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</li>
        @endforeach
      </ul>
      <script src="/js/app.js" charset="utf-8"></script>
    </div>
</div>
@endsection
