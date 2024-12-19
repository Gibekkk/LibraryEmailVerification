<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('books.addProcess') }}">
            @csrf

            <!-- Judul -->
            <div>
                <x-input-label for="judul" :value="__('Title')" />
                <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="old('judul')"
                    required autofocus autocomplete="judul" />
                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
            </div>

            <!-- Penerbit -->
            <div class="mt-4">
                <x-input-label for="penerbit" :value="__('Publisher')" />
                <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" :value="old('penerbit')"
                    required autocomplete="penerbit" />
                <x-input-error :messages="$errors->get('penerbit')" class="mt-2" />
            </div>

            <!-- Penulis -->
            <div class="mt-4">
                <x-input-label for="penulis" :value="__('Author')" />
                <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="old('penulis')"
                    required autocomplete="penulis" />
                <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
            </div>

            <!-- Tahun Terbit -->
            <div class="mt-4">
                <x-input-label for="tahun_terbit" :value="__('Year of Publication')" />
                <x-text-input id="tahun_terbit" class="block mt-1 w-full" type="number" name="tahun_terbit"
                    :value="old('tahun_terbit')" required autocomplete="tahun_terbit" />
                <x-input-error :messages="$errors->get('tahun_terbit')" class="mt-2" />
            </div>

            <!-- ISBN -->
            <div class="mt-4">
                <x-input-label for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn" :value="old('isbn')" required
                    autocomplete="isbn" />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>

            <!-- Is Ebook -->
            <div class="mt-4">
                <x-input-label for="isEbook" :value="__('Is Ebook?')" />
                <x-checkbox :id="'isEbook'" :name="'isEbook'" :checked="old('isEbook')" />
                <x-input-error :messages="$errors->get('isEbook')" class="mt-2" />
            </div>

            <!-- Ebook Link (Optional) -->
            <div class="mt-4" id="ebookLinkSection" style="display: none;">
                <x-input-label for="ebookLink" :value="__('Ebook Link')" />
                <x-text-input id="ebookLink" class="block mt-1 w-full" type="url" name="ebookLink"
                    :value="old('ebookLink')" />
                <x-input-error :messages="$errors->get('ebookLink')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Add Book') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        // Show/Hide Ebook Link input based on isEbook checkbox
        document.getElementById('isEbook').addEventListener('change', function () {
            const ebookLinkSection = document.getElementById('ebookLinkSection');
            if (this.checked) {
                ebookLinkSection.style.display = 'block';
            } else {
                ebookLinkSection.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
