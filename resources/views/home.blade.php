@extends('layouts.userLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<<<<<<< HEAD
          <div class="panel panel-default">

    <div class="panel-heading"><b>Profile:</b> {{ Auth::user()->username }}

      <a href="<?php echo url('/profile/edit/'.Auth::user()->id); ?>">(edit)</a>
    </div>

    <div class="panel-body">
      <b>Name:</b> {{ Auth::user()->name }}<br>
      <b>Email:</b> {{ Auth::user()->email }}<br>
    </div>
</div>
=======
          <div class="panel-heading">Dashboard</div>

              <div class="panel-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

                  You are logged in as USER!
              </div>
>>>>>>> parent of 0fbe177... run back
        </div>
    </div>
</div>
@endsection
