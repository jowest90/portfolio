@extends('layouts.userLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to my Portfolio!
                    Here, you can view some of my latest as well as previous forms of work that I've done in the past. All porjects can be viewed on the tabs above the page.
                    Enjoy your stay!

                    <p>-John W. West III</p>

                    <p>Contact info:
                    <p>Email- jowest1990@gmail.com</p>
                    <p>Skype- jowest1990@outlook.com</p>
                    <p>Phone #- 618 402 2314</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
