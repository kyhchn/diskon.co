<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>
    <div class="px-4 py-4">
        @if (isset($threads))
            @foreach ($threads as $thread)
                <p>{{ $thread }}</p>
                <form action="{{ route('thread.destroy', $thread->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
            @endforeach
        @else
            <p>data threads masih kosong</p>
        @endif
    </div>
</x-app-layout>
