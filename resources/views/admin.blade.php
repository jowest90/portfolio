@extends('layout.adminLayout')
<style>
.loginBox {
border: 1px solid black;
text-align:center;
width:25%;
margin-top: 100px;
margin-left: 37%;
}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')
                @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
