<x-inputs.base-input :label="$label" :name="$name" :required="$required" :attributes="$attributes">
    <input type="file" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" @if ($required) required @endif @foreach ($attributes as $key=> $attr)
    {{ $key }}="{{ $attr }}" @endforeach>
</x-inputs.base-input>