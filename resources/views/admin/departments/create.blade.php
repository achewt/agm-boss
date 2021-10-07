@extends('layouts.admin')
@section('title', 'Add Department')
@section('body_title', 'Add Department')

@section('content')

<x-main-content goBack="{{ route('view-departments') }}" bcSecond="Cities" bcSecondLink="{{ route('view-departments') }}">
    <div class="card">
        <div class="card-body">
            <x-form-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('save-department') }}" method="POST" class="needs-validation" novalidate="">
                @csrf

                @if(isset($department['id']))
                    <input type="hidden" name="id" value="{{ $department['id'] }}">
                @endif

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$department['name'] ?? ''}}" autofocus="true" required="true" name="name" type="text" label="Name"></x-input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$department['remarks'] ?? ''}}" autofocus="true" name="remarks" type="text" label="Remarks"></x-input>
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