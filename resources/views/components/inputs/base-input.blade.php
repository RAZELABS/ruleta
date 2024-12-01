<div class="mb-3 {{ $boxClass }}">
    @if ($label)
        <label for="{{ $name }}" class="form-label {{ $labelClass }}">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    {{ $slot }}
    <div class="invalid-feedback">
        Please select a valid input.
    </div>
    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
