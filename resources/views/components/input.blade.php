@php
    if (isset($autofocus)) {
        $autofocus = "autofocus";
    }

    if (isset($required) && $required == "true") {
        $required = "required";
    }
@endphp

<div class="form-group">
    {{ $slot }}
    <label for="{{ $name ?? 'name' }}">{{ $label ?? 'label' }}</label>
    <div class="input-group">
        <input type="{{ $type ?? 'text' }}"
            id="{{ $name ?? 'name' }}"
            name="{{ $name ?? 'name' }}"
            value="{{ $value ?? '' }}"
            class="form-control"
            {{ $required ?? "" }}
            {{ $autofocus ?? "" }}
            {{ $disabled ?? "" }}
        />
        <div class="invalid-feedback">
            Please fill in the data in {{ $label }}.
        </div>
    </div>
</div>