@extends('layouts.admin')
@section('title', 'Add City')
@section('body_title', 'Add City')

@section('content')

<x-main-content goBack="{{ route('view-cities') }}" bcSecond="Cities" bcSecondLink="{{ route('view-cities') }}">
    <div class="card">
        <div class="card-body">
            <x-form-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('save-city') }}" method="POST" class="needs-validation" novalidate="">
                @csrf

                @if(isset($city['id']))
                    <input type="hidden" name="id" value="{{ $city['id'] }}">
                @endif

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$city['name'] ?? ''}}" autofocus="true" required="true" name="name" type="text" label="Name"></x-input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <x-input value="{{$city['remarks'] ?? ''}}" autofocus="true" name="remarks" type="text" label="Remarks"></x-input>
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