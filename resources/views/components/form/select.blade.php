@props([
    'name',
    'label' => null,
    'id' => null,
    'options' => [],
    'selected' => null,
])

<div class="mb-4">
    @if($label)
        <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif
    <select 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}"
        {{ $attributes->merge(['class' => 'w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-500 transition-shadow']) }}
    >
        <option value="">Select {{ $label ?? 'Option' }}</option>
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ (old($name, $selected) == $option->id) ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
    {{ $slot }}
</div>