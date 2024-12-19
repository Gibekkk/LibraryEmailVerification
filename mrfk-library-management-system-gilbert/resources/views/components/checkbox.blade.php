<label for="{{ $id ?? 'checkbox' }}" class="inline-flex items-center">
    <input id="{{ $id ?? 'checkbox' }}" type="checkbox" name="{{ $name }}" {{ $attributes }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <span class="ml-2">{{ $slot }}</span>
</label>
