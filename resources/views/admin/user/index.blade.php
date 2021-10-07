@extends('layouts.admin')

@section('title', 'User')
@section('body_title', 'User List')

@php
    $headers = ['Name', 'Email', 'Noway'];
    $records = $users;
    $columns = ['name', 'email', 'noway'];
    $edit_delete = ['update-user', 'delete-user'];
@endphp

@section('content')

<x-main-content addLink="{{ route('create-user') }}" bcSecond="Users">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>@yield('body_title')</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <x-table :headers="$headers" :columns="$columns" :records="$records" :routes="$edit_delete"></x-table>
                </div>

            </div>
        </div>
        </div>
    </div>
</x-main-content>

@endsection