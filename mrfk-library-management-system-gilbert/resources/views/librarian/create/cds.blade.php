<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add CD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('cds.add') }}">
            @csrf

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Artist -->
            <div class="mt-4">
                <x-input-label for="artist" :value="__('Artist')" />
                <x-text-input id="artist" class="block mt-1 w-full" type="text" name="artist" :value="old('artist')" required autocomplete="artist" />
                <x-input-error :messages="$errors->get('artist')" class="mt-2" />
            </div>

            <!-- Publisher -->
            <div class="mt-4">
                <x-input-label for="publisher" :value="__('Publisher')" />
                <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher" :value="old('publisher')" required autocomplete="publisher" />
                <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
            </div>

            <!-- Release Year -->
            <div class="mt-4">
                <x-input-label for="release_year" :value="__('Release Year')" />
                <x-text-input id="release_year" class="block mt-1 w-full" type="number" name="release_year" :value="old('release_year')" required autocomplete="release_year" />
                <x-input-error :messages="$errors->get('release_year')" class="mt-2" />
            </div>

            <!-- Genre -->
            <div class="mt-4">
                <x-input-label for="genre" :value="__('Genre')" />
                <x-text-input id="genre" class="block mt-1 w-full" type="text" name="genre" :value="old('genre')" required autocomplete="genre" />
                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Add CD') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
