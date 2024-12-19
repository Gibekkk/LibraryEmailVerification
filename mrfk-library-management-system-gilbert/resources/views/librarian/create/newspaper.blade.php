<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Newspaper') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('newspapers.add') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Newspaper Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Publication Date -->
            <div class="mt-4">
                <x-input-label for="publication_date" :value="__('Publication Date')" />
                <x-text-input id="publication_date" class="block mt-1 w-full" type="date" name="publication_date" :value="old('publication_date')" required />
                <x-input-error :messages="$errors->get('publication_date')" class="mt-2" />
            </div>

            <!-- Publisher -->
            <div class="mt-4">
                <x-input-label for="publisher" :value="__('Publisher')" />
                <x-select name="publisher" :options="['Kompas' => 'Kompas', 'Tribun Timur' => 'Tribun Timur', 'Fajar' => 'Fajar']" :selected="old('publisher')" />
                <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
            </div>

            <!-- Language -->
            <div class="mt-4">
                <x-input-label for="language" :value="__('Language')" />
                <x-text-input id="language" class="block mt-1 w-full" type="text" name="language" :value="old('language')" required />
                <x-input-error :messages="$errors->get('language')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Add Newspaper') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
