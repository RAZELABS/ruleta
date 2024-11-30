<x-inputs.base-input :label="$label" :name="$name" :required="$required">
    <textarea
        class="form-control @error($name) is-invalid @enderror"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @foreach($attributes as $key => $attr)
            {{ $key }}="{{ $attr }}"
        @endforeach
    >{{ old($name, $value ?? '') }}</textarea>
</x-inputs.base-input>
