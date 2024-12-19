<select name="{{ $name }}" id="{{ $name }}" class="block mt-1 w-full">
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
