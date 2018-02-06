@extends('layouts.forum')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">

    <div class="panel-heading"><b>Profile:</b> {{ Auth::user()->username }}

      <a href="<?php echo url('/profile/edit/'.Auth::user()->id); ?>">(edit)</a>
    </div>

    <div class="panel-body">
      <b>Name:</b> {{ Auth::user()->name }}<br>
      <b>Email:</b> {{ Auth::user()->email }}<br>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
