@extends('layouts.adminLayout')

@section('content')
<div class="col-md-8 col-md-offset-2">
<h1>Users</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
		@foreach($users as $user)
    <tr>
      <td>{!! $user->name !!} </td>
      <td>{!! $user->email !!}</td>
      <td><a href='{{ url('/admin/userscores/'.$user->id) }}'>View Scores</a>&nbsp&nbsp&nbsp<a href="<?php echo url('/admin/editUser/edit/'.$user->id); ?>">Edit</a>
&nbsp&nbsp&nbsp<a href="<?php echo url('/admin/user/delete/'.$user->id); ?>">Delete</a></td>
    </tr>
		@endforeach
  </tbody>
</table>
</div>

@endsection
