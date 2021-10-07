@extends('layouts.admin')
@section('title', 'Add Designation')
@section('body_title', 'Add Designation')

@section('content')

<x-main-content goBack="{{ route('view-designations') }}" bcSecond="Designations" bcSecondLink="{{ route('view-designations') }}">
    <div class="card">
        <div class="card-body">
            <x-form-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('save-designation') }}" method="POST" class="needs-validation" novalidate="">
                @csrf

                @if(isset($designation['id']))
                    <input type="hidden" name="id" value="{{ $designation['id'] }}">
                @endif

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$designation['name'] ?? ''}}" autofocus="true" required="true" name="name" type="text" label="Name"></x-input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$designation['remarks'] ?? ''}}" autofocus="true" name="remarks" type="text" label="Remarks"></x-input>
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