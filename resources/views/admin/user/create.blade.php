@extends('layouts.admin')

@section('title', 'Add User')
@section('body_title', 'Add User')

@section('content')

<x-main-content goBack="{{ route('view-users') }}" bcSecond="Users" bcSecondLink="{{ route('view-users') }}">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>@yield('title')</h4>
            </div>
            <div class="card-body">
                <x-form-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('save-user') }}" class="needs-validation" novalidate="">
                    @csrf

                    @if(isset($user['id']))
                        <input type="hidden" name="id" value="{{ $user['id'] }}">
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <x-input value="{{$user['name'] ?? ''}}" required="true" name="name" type="text" label="Full Name"></x-input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-input value="{{$user['email'] ?? ''}}" required="true" name="email" type="text" label="Email Address"></x-input>
                        </div>
                    </div>

                    @if(!isset($user['id']))
                        <div class="row">
                            <div class="col-md-6">
                                <x-input value="{{$user['password'] ?? ''}}" required="true" name="password" type="password" label="Password"></x-input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-input value="{{$user['password'] ?? ''}}" required="true" name="password_confirmation" type="password" label="Confirm Password"></x-input>
                            </div>
                        </div>
                    @endif

                    <!-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                        <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                            <option>Tech</option>
                            <option>News</option>
                            <option>Political</option>
                        </select>
                        </div>
                    </div> -->
                    <!-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                            <option>Publish</option>
                            <option>Draft</option>
                            <option>Pending</option>
                        </select>
                        </div>
                    </div> -->

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