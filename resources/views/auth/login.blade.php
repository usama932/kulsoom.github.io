@extends('layouts.login_master')

@section('content')
<div class="page-content login-cover">

    <!-- Main content -->
    <div class="content-wrapper" style="background-color: #0c0b39;">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form class="login-form " method="post" action="{{ route('login') }}">
                @csrf
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src='{{ asset("global_assets/images/logo.jpeg") }}' width="200" height="200" style="border-radius: 50%">
                            <h5 class="mb-0 pt-1 pb-1">LOGIN TO YOUR ACCOUNT</h5>
                            <span class="d-block text-muted">Your credentials</span>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger alert-styled-left alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <span class="font-weight-semibold">Oops!</span> {{ implode('<br>', $errors->all()) }}
                        </div>
                        @endif


                        <div class="form-group ">
                            <input type="text" class="form-control" name="identity" value="{{ old('identity') }}" placeholder="Login ID or Email">
                        </div>

                        <div class="form-group ">
                            <input required name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">

                        </div>

                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input style="width: 20px; height:20px;" type="checkbox" name="remember" class="form-input-styled" {{ old('remember') ? 'checked' : '' }} data-fouc>
                                    Remember
                                </label>
                            </div>

                            <a href="{{ route('password.request') }}" class="ml-auto" style="color: #e08a00;">Forgot password?</a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" style="color:#fff;background-color: #e58c00;border-color: #985e11;">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('index') }}" class="btn btn-light btn-block"><i class="icon-home"></i> Back to Home</a>
                        </div>


                    </div>
                </div>
            </form>

        </div>


    </div>

</div>
@endsection
