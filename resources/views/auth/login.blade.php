@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <x-form-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
        @csrf
        <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
        <div class="invalid-feedback">
            Please fill in your email
        </div>
        </div>

        <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Password</label>
            <div class="float-right">
            <a href="{{ route('password.request')}}" class="text-small">
                Forgot Password?
            </a>
            </div>
        </div>
        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
        <div class="invalid-feedback">
            please fill in your password
        </div>
        </div>

        <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
            <label class="custom-control-label" for="remember-me">Remember Me</label>
        </div>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
        </button>
        </div>
    </form>


@endsection