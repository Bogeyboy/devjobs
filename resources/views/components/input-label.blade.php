@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-gray-500 dark:text-white font-bold uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>
