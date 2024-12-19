<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Journal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('journals.addProcess') }}">
            @csrf

            <!-- Judul (Title) -->
            <div>
                <x-input-label for="judul" :value="__('Title')" />
                <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="old('judul')" required autofocus />
                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
            </div>

            <!-- Penerbit (Publisher) -->
            <div class="mt-4">
                <x-input-label for="penerbit" :value="__('Publisher')" />
                <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" :value="old('penerbit')" required />
                <x-input-error :messages="$errors->get('penerbit')" class="mt-2" />
            </div>

            <!-- Penulis (Author) -->
            <div class="mt-4">
                <x-input-label for="penulis" :value="__('Author')" />
                <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="old('penulis')" required />
                <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
            </div>

            <!-- Tahun Terbit (Publication Year) -->
            <div class="mt-4">
                <x-input-label for="tahun_terbit" :value="__('Publication Year')" />
                <x-text-input id="tahun_terbit" class="block mt-1 w-full" type="number" name="tahun_terbit" :value="old('tahun_terbit')" required />
                <x-input-error :messages="$errors->get('tahun_terbit')" class="mt-2" />
            </div>

            <!-- ISBN -->
            <div class="mt-4">
                <x-input-label for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn" :value="old('isbn')" required />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Add Journal') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
