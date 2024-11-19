<x-inputs.base-input :label="$label" :name="$name" :required="$required" >
    <select class="form-select @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $multiple ? $name . '[]' : $name }}"
            @if($multiple) multiple @endif
            @if($required) required @endif
            @foreach($attributes as $key => $attr)
                {{ $key }}="{{ $attr }}"
            @endforeach
    >
        @if(!$multiple)
            <option value="" selected disabled>Seleccione una opción</option>
        @endif
        @foreach($options as $value => $display)
            <option value="{{ $value }}"
                @if(is_array(old($name)) && in_array($value, old($name))) selected
                @elseif(old($name) == $value) selected
                @endif
            >{{ $display }}</option>
        @endforeach
    </select>
</x-inputs.base-input>
