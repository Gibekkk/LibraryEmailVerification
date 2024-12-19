<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add FYP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('final_year_projects.addProcess') }}">
            @csrf

            <!-- Title -->
            <div class="mt-4">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Student Name -->
            <div class="mt-4">
                <x-input-label for="student_name" :value="__('Student Name')" />
                <x-text-input id="student_name" class="block mt-1 w-full" type="text" name="student_name" :value="old('student_name')" required />
                <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
            </div>

            <!-- Supervisor -->
            <div class="mt-4">
                <x-input-label for="supervisor" :value="__('Supervisor')" />
                <x-text-input id="supervisor" class="block mt-1 w-full" type="text" name="supervisor" :value="old('supervisor')" required />
                <x-input-error :messages="$errors->get('supervisor')" class="mt-2" />
            </div>

            <!-- Submission Year -->
            <div class="mt-4">
                <x-input-label for="submission_year" :value="__('Submission Year')" />
                <x-text-input id="submission_year" class="block mt-1 w-full" type="number" name="submission_year" :value="old('submission_year')" required />
                <x-input-error :messages="$errors->get('submission_year')" class="mt-2" />
            </div>

            <!-- Abstract -->
            <div class="mt-4">
                <x-input-label for="abstract" :value="__('Abstract')" />
                <x-textarea id="abstract" class="block mt-1 w-full" name="abstract" :value="old('abstract')" rows="4" />
                <x-input-error :messages="$errors->get('abstract')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Add FYP') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
