@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-blue-800 focus:ring focus:ring-blue-800 focus:ring-opacity-50']) !!}>
