@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Applications') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <a href="{{ url('/chat') }}">Chat</a>
                    <p></p>
                    <p>Restaurant Management System:</p>
                    <p>Desc: A management application and creates food orders for customers</p>
                    <!-- Food App -->
                    <div class="row text-center">
                        <!-- management -->
                      <div class="col-sm-4">
                          <a href="/management">
                              <h4>Managment</h4>
                              <img width="50px" src="{{asset('images/management.svg')}}"/>
                          </a>
                      </div>
                      <!-- cashier -->
                      <div class="col-sm-4">
                              <a href="/cashier">
                                  <h4>Cashier</h4>
                                  <img width="50px" src="{{asset('images/cashier.svg')}}"/>
                              </a>
                          </div>
                      <!-- report -->
                      <div class="col-sm-4">
                              <a href="/report">
                                  <h4>Report</h4>
                                  <img width="50px" src="{{asset('images/report.svg')}}"/>
                              </a>
                          </div>
                      <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
