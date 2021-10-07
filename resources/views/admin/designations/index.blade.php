@extends('layouts.admin')
@section('title', 'Designations')
@section('body_title', 'Designations List')

@php
    $headers = ['Name', 'Remarks'];
    $records = $designations;
    $columns = ['name', 'remarks'];
    $edit_delete = ['edit-designation', 'delete-designation'];
@endphp

@section('content')
<x-main-content addLink="{{ route('create-designation') }}" bcSecond="Designations">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>@yield('body_title')</h4>
            </div>
            <div class="card-body">
                <x-session-flash-message></x-session-flash-message>
                <div class="table-responsive">
                    <x-table :headers="$headers" :columns="$columns" :records="$records" :routes="$edit_delete"></x-table>
                </div>

            </div>
        </div>
        </div>
    </div>
</x-main-content>
@endsection