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
                <form action="{{ route('thread.destroy', $thread->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                </form>

                <form action="{{ route('thread.edit', $thread->id) }}" method="GET">
                    @csrf
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Edit</button>
                </form>
            @endforeach
        @else
            <p>data threads masih kosong</p>

        @endif
    </div>
</x-app-layout>
