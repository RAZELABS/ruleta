<x-inputs.base-input :label="$label" :name="$name" :required="$required" >
    <input type="password"
           class="form-control @error($name) is-invalid @enderror"
           id="{{ $name }}"
           name="{{ $name }}"
           placeholder="{{ $placeholder }}"
           @if($required) required @endif
           @foreach($attributes as $key => $attr)
               {{ $key }}="{{ $attr }}"
           @endforeach
    >
    <x-inputs.input-error :messages="$errors->updatePassword->get('{{$name}}')" class="mt-2" />
</x-inputs.base-input>
