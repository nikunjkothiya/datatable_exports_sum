@extends('layouts.app')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to Demo.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end mb-2">
                                <img src="{{ asset('assets/images/admin_logo.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="#">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            @if(\Session::has('message'))
                            <p class="alert alert-info">
                                {{ \Session::get('message') }}
                            </p>
                            @endif
                            <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus placeholder="Email" value="{{ old('email', null) }}">
                                    @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                                    @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember
                                        me</label>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p>Don't have an account ? <a href="{{ route('register') }}" class="font-weight-medium text-primary">
                            Signup now </a> </p>
                    <p>© 2021, Designed & Developed <i class="mdi mdi-heart text-danger"></i> by <a href="#" target="_blank"> Demo </a></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection