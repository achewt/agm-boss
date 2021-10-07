@extends('layouts.admin')
@section('title', 'Add Role')
@section('body_title', 'Add Role')

@section('content')

<x-main-content goBack="{{ route('view-roles') }}" bcSecond="Roles" bcSecondLink="{{ route('view-roles') }}">
    <div class="card">
        <div class="card-body">
            <x-form-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('save-role') }}" method="POST" class="needs-validation" novalidate="">
                @csrf

                @if(isset($role['id']))
                    <input type="hidden" name="id" value="{{ $role['id'] }}">
                @endif

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$role['name'] ?? ''}}" autofocus="true" required="true" name="name" type="text" label="Role Name"></x-input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label>Permission</label>
                        <br />
                        @foreach($permission as $value)
                            @if(in_array($value['id'], $rolePermissions))
                                <x-simple-switch-list name="permission[]" label="{{ $value->name }}" value="{{ $value->id}}" checked></x-simple-switch>
                            @else
                                <x-simple-switch-list name="permission[]" label="{{ $value->name }}" value="{{ $value->id}}"></x-simple-switch>
                            @endif 
                        @endforeach
                        <br />
                    </div>
                </div>
                
                <div class="row">
                    <x-button icon="fas fa-save" type="submit" name="submit" label="Save"></x-input>
                </div>
            </form>
        </div>
    </div>
</x-main-content>
@endsection