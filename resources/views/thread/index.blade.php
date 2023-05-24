<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>

    <form action="/threads">
        <div class="relative border-1 border-gray-100 m-4 rounded-lg  ">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <input type="text" name="search"
                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="Search Threads Here..." />
            <div class="absolute top-2 right-2">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                    Search
                </button>
            </div>
        </div>
    </form>

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
