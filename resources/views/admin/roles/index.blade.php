@extends('layouts.admin')
@section('title', 'Roles')
@section('body_title', 'Roles List')

@php
    $headers = ['Name'];
    $records = $roles;
    $columns = ['name'];
    $edit_delete = ['update-role', 'delete-role'];
@endphp

@section('content')
<x-main-content addLink="{{ route('create-role') }}" bcSecond="Roles">
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