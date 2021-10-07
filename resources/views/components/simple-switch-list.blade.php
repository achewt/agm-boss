@php
    if(isset($required)) {
        $required = "required";
    }
    
    if(isset($checked) && $checked == "true") {
        $checked = "checked";
    }
@endphp


<!-- <div class="form-group"> -->
    <label class="mt-4">
        <input type="checkbox"
        name="{{ $name ?? 'name' }}"
        class="custom-switch-input"
        {{ $required ?? '' }}
        {{ $checked ?? '' }}
        id="{{ $name ?? 'name' }}"
        value="{{ $value ?? '' }}">
        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description"></span>{{ $label ?? 'Switch' }}
    </label>
<!-- </div> -->
<br />