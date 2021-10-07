<div class="form-group">
    <button type="{{ $type ?? 'submit' }}"
        name="{{ $name ?? 'name' }}" 
        class="btn btn-icon icon-left btn-primary" 
        tabindex="{{ $ti ?? '' }}">
        <i class="{{ $icon ?? '' }}"></i>
        {{ $label ?? 'Label' }}
    </button>
</div>