<<<<<<< HEAD
@extends('layouts.forum')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
=======
@extends('layouts.userLayout')

@section('content')
<div class="Box" id = "box">
>>>>>>> parent of 0fbe177... run back
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/update')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                              <input name="id" type="hidden" value="{{$user->id}}">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<<<<<<< HEAD
=======
                        <div class="form-group{{ $errors->has('certification') ? ' has-error' : '' }}">
                            <label for="certification" class="col-md-4 control-label">Certification</label>

                            <div class="col-md-6">
                                <input id="certification" type="text" class="form-control" name="certification" value="{{ $user->certification }}">

                                @if ($errors->has('certification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

>>>>>>> parent of 0fbe177... run back
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Edit Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
<<<<<<< HEAD
              </div>
            </div>
          </div>
        </div>
=======
</div>
>>>>>>> parent of 0fbe177... run back
@endsection
