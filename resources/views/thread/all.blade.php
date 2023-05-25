<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>

    @include('partials._search')

    <div class="px-4 py-4">
        @if (isset($threads))
            @foreach ($threads as $thread)
                <p>{{ $thread }}</p>
            @endforeach
        @else
            <p>data threads masih kosong</p>

        @endif
    </div>
</x-app-layout>
