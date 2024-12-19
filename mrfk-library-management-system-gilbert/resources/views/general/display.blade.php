<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="route('books')" :active="request()->routeIs('books')">
            {{ __('Books') }}
        </x-nav-link>
        <x-nav-link :href="route('cds')" :active="request()->routeIs('cds')">
            {{ __('CDs') }}
        </x-nav-link>
        <x-nav-link :href="route('newspapers')" :active="request()->routeIs('newspapers')">
            {{ __('Newspapers') }}
        </x-nav-link>
        <x-nav-link :href="route('journals')" :active="request()->routeIs('journals')">
            {{ __('Journals') }}
        </x-nav-link>
        <x-nav-link :href="route('final_year_projects')" :active="request()->routeIs('final_year_projects')">
            {{ __('Final Year Projects') }}
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <h1>Daftar {{ $type }}
            <x-nav-link :href="'/' . $location . '/' . ($sort == 'asc' ? 'desc' : 'asc')">
                {{ __('(Change Order)') }}
            </x-nav-link>
        </h1>
        <table>
            <thead>
                <tr>
                    @foreach ($fields as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        @foreach ($fields as $field)
                            <td>{{ $data->{strtolower(implode('_', explode(' ', $field)))} }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (Route::has($location.'.add') && Auth::user()->level == "librarian")
            <x-nav-link :href="route($location.'.add')">
                {{ __('Tambahkan '.$type) }}
            </x-nav-link>
        @endif
    </div>
</x-app-layout>
