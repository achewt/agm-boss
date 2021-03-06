@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')


<p class="text-muted">We will send a link to reset your password</p>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
    <label for="email">Email Address</label>
    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
    </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        {{ __('Send Password Reset Link') }}
    </button>
    </div>
</form>


@endsection