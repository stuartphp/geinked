@props(['disabled' => false, 'name', 'type'=>'text'])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control form-control-sm']) !!} type="{{ $type }}" name="{{ $name}} ">
@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
