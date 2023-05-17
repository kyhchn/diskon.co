<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>
    <div class="px-4 py-4">
        @if (isset($thread))
        <p>{{$thread}}</p>
        @else
            <p>data threads masih kosong</p>
        @endif
    </div>
</x-app-layout>
