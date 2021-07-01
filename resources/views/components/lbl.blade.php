@props(['value'])
<label {{ $attributes->merge(['class' => 'control-lable']) }}>
    {{ $value ?? $slot }}
</label>
