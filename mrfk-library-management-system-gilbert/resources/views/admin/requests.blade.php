<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="'/requests/book'" :active="request()->routeIs('requests') && $collectionType == 'book'">
            {{ __('Books') }}
        </x-nav-link>
        <x-nav-link :href="'/requests/cds'" :active="request()->routeIs('requests') && $collectionType == 'cds'">
            {{ __('CDs') }}
        </x-nav-link>
        <x-nav-link :href="'/requests/newspaper'" :active="request()->routeIs('requests') && $collectionType == 'newspaper'">
            {{ __('Newspapers') }}
        </x-nav-link>
        <x-nav-link :href="'/requests/journal'" :active="request()->routeIs('requests') && $collectionType == 'journal'">
            {{ __('Journals') }}
        </x-nav-link>
        <x-nav-link :href="'/requests/fyp'" :active="request()->routeIs('requests') && $collectionType == 'fyp'">
            {{ __('Final Year Projects') }}
        </x-nav-link>
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
                            <td>
                                <form method="POST" action="/approveRequest/{{ $collectionType }}">
                                    @csrf
                                    <input type="hidden" name="req_id" value="{{ $data->req_id }}">
                                    <x-dropdown-link :href="'/approveRequest'"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Approve') }}
                                    </x-dropdown-link>
                                </form>
                                <form method="POST" action="/declineRequest/{{ $collectionType }}">
                                    @csrf
                                    <input type="hidden" name="req_id" value="{{ $data->req_id }}">
                                    <x-dropdown-link :href="'/declineRequest'"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Decline') }}
                                    </x-dropdown-link>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Requests</h1>
        @endif
    </div>
</x-app-layout>
