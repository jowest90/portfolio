@extends('layouts.app')

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

                    <img src="{{ asset('/images/JWestProfile.jpg') }}" alt="Profile image">
                      <p><font size="14px"><b>John W. West III</b></font></p>
                      <p><font size="5px">PHP Web developer</font></p>
                      @include('layouts.blocks.about')
                      <p></p>
                      @include('layouts.blocks.work')
                      <p></p>
                      @include('layouts.blocks.eduaction')
                      <p></p>
                      @include('layouts.blocks.certifications')
                      <p></p>
                      @include('layouts.blocks.contact')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
