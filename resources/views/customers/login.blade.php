@extends('layouts.login_master')

@section('content')
<style>

    </style>
<div class="page-content login-cover">

    <!-- Main content -->
    <div class="content-wrapper" style="background-color: #0c0b39;">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form class="login-form " method="post" action="{{ route('customers.loginuser') }}">
                @csrf
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src='{{ asset("global_assets/images/logo.jpeg") }}' width="180" height="175" style="border-radius: 50%">
                            <h5 class="mb-0 pt-1 pb-1">Login to your Account</h5>
                            <span class="d-block text-muted">Add Credentials</span>
                        </div>

                        <div class="form-group ">
                            <input required name="email" type="email" class="form-control" placeholder="Email Address">
                            <span class="text-danger">@error('email') {{$message}} @enderror </span>

                        </div>

                        <div class="form-group ">
                            <input required name="password" type="password" class="form-control" placeholder="Enter Password">
                            <span class="text-danger">@error('password') {{$message}} @enderror </span>

                        </div>

                     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" style="color:#fff;background-color: #e58c00;border-color: #985e11;">Login <i class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('index') }}" class="btn btn-light btn-block"><i class="icon-home"></i> Back to Home</a>
                        </div>
                        <a href="{{ route('register') }}"><p>New User? Register </p> </a>



                    </div>
                </div>
            </form>

        </div>


    </div>

</div>
@endsection
