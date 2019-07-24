@extends('layouts.userLayout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">test</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            test
        </div>

        <input type=button name=type id='bt1' value='Show Layer' onclick="setVisibility('sub3');";>
          <div id="sub3">
            <table>
              <tr>
                <th>Email</th>
                <th>Status</th>
              </tr>
              @foreach($users as $chatuser)
              <tr>

                <td class="list-group-item" value="{{ $chatuser->email }}">{{ $chatuser->email }}</td>
                <td class="list-group-item" value="{{ $chatuser->activated }}">{{ $chatuser->activated }}</td>

              </tr>
              @endforeach
            </table>
              <!-- <li class="list-group-item" value="{{ $chatuser->email }}">{{ $chatuser->email }}</li> -->
          </div>
    </div>
</div>
@endsection
