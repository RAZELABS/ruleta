<x-inputs.base-input :label="$label" :name="$name" :required="$required" >
    <input type="number"
           class="form-control @error($name) is-invalid @enderror"
           id="{{ $name }}"
           name="{{ $name }}"
           value="{{ old($name) }}"
           placeholder="{{ $placeholder }}"
           @if($min !== null) min="{{ $min }}" @endif
           @if($max !== null) max="{{ $max }}" @endif
           @if($step !== null) step="{{ $step }}" @endif
           @if($required) required @endif
           @foreach($attributes as $key => $attr)
               {{ $key }}="{{ $attr }}"
           @endforeach
    >
</x-inputs.base-input>
