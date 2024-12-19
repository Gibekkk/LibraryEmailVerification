<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Librarians Account') }}
        </h2>
    </x-slot>

    <div>
        @if (count($datas) > 0)
            <table>
                <thead>
                    <tr>
                        @foreach ($fields as $field)
                            <th>{{ $field }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            @foreach ($fields as $field)
                                <td>{{ $data->{strtolower(implode('_', explode(' ', $field)))} }}</td>
                            @endforeach
                            @if (!$data->isDeleted)
                                <td>
                                    <form method="POST" action="/removeLibrarian">
                                        @csrf
                                        <input type="hidden" name="librarianID" value="{{ $data->id }}">
                                        <x-dropdown-link :href="'/removeLibrarian'"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </td>
                            @else
                                <td>Deleted</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Librarians</h1>
        @endif
        <x-nav-link :href="route('addLibrarian')" :active="request()->routeIs('addLibrarian')">
            {{ __('Add Librarian') }}
        </x-nav-link>
    </div>
</x-app-layout>
