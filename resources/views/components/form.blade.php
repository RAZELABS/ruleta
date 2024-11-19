<!-- resources/views/components/form.blade.php -->
<form action="{{ $action }}" method="{{ in_array($method, ['GET', 'POST']) ? $method : 'POST' }}"
     @if($enctype) enctype="{{ $enctype ?? '' }}" @endif class="{{$class}}" {{ $attributes }}>
    @csrf
    @if (!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif
    {{ $slot }}
</form>

