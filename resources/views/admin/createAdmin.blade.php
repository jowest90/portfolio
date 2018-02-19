<<<<<<< HEAD
@extends('layout.adminLayout')
=======
@extends('layouts.adminLayout')
>>>>>>> parent of 0fbe177... run back
<style>
.Box {
border: 1px solid black;
text-align:center;
width:25%;
margin-top: 100px;
margin-left: 37%;
}
</style>
@section('content')
<div class="Box" id = "box">
  <div class="panel-body">
<<<<<<< HEAD
      <form class="form-horizontal" method="POST" action="{{ route('admin.createAdmin.submit') }}">
=======
    <div class="panel-heading"><h2>Create Admin</h2></div>
      <form class="form-horizontal" method="POST" action="{{ url('/admin/createAdmin') }}">
>>>>>>> parent of 0fbe177... run back
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name</label>

              <div class="col-md-6">
<<<<<<< HEAD
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
=======
                  <input id="name" type="text" class="form-control" name="name" placeholder="(First) (Last) name" value="{{ old('name') }}" required autofocus>
>>>>>>> parent of 0fbe177... run back

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
<<<<<<< HEAD
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
=======
                  <input id="email" type="email" class="form-control" name="email" placeholder="name@email.com" value="{{ old('email') }}" required>
>>>>>>> parent of 0fbe177... run back

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<<<<<<< HEAD
              <label for="password" class="col-md-4 control-label">Password</label>
=======
              <label for="password" class="col-md-4 control-label">Password *</label>
>>>>>>> parent of 0fbe177... run back

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Register
                  </button>
              </div>
          </div>
<<<<<<< HEAD
=======
          * Password must contain 1 lower case character 1 upper case character one number. Minimum 8
>>>>>>> parent of 0fbe177... run back
      </form>
  </div>
</div>
@endsection
