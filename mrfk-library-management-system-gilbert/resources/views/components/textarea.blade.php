<div>
    <x-input-label :for="$name" :value="ucwords(str_replace('_', ' ', $name))" />
    <textarea id="{{ $name }}" name="{{ $name }}" class="block mt-1 w-full" rows="{{ $rows }}">{{ old($name, $value) }}</textarea>
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
