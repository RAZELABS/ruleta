<x-inputs.base-input
    :label="$label"
    :name="$name"
    :boxClass="$boxClass"
    :labelClass="$labelClass"
    :required="$required"
    :attributes="$attributes"
>
    <input
        type="text"
        class= "form-control {{ $inputClass }} @error($name) is-invalid @enderror"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        @foreach ($attributes as $key => $attr)
            {{ $key }}="{{ $attr }}"
        @endforeach
    />

</x-inputs.base-input>
