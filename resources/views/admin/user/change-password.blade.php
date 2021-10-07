@extends('layouts.admin')

@section('title', 'Change Password')
@section('body_title', 'Change Password')

@section('content')

<x-main-content bcSecond="Change Password">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>@yield('title')</h4>
            </div>
            <div class="card-body">
                <x-form-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('change-password') }}">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Old Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" name="old_password">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">New Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" name="new_password">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Confirm New Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" name="new_password_confirmation">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</x-main-content>

@endsection