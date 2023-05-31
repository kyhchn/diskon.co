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
                <div class="container my-3 mx-auto bg-red-400 rounded-md px-2 py-2">
                    <p>{{ $thread }}</p>
                    {{-- <p>{{$thread->user}}</p>kalo mau dapetin user --}}
                    @foreach ($thread->komen as $komen)
                        <div class="container my-1 px-2 bg-red-300 rounded-md py-2">
                            <p>{{ $komen }}</p>
                            <div class="flex flex-row space-x-3">
                                <form action="{{ route('komen.destroy', $komen->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                                </form>

                                <form action="{{ route('komen.edit', $komen->id) }}" method="GET">
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Edit</button>
                                </form>
                                <form action="{{ route('reply.create', $komen->id) }}" method="GET">
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Reply</button>
                                </form>
                            </div>
                            @foreach ($komen->reply as $reply)
                                <div class="container my-1 px-2 bg-red-200 rounded-md py-2">
                                    <p>{{ $reply }}</p>
                                    <div class="flex flex-row space-x-3">
                                        <form action="{{ route('reply.destroy', $reply->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500"><i
                                                    class="fa-solid fa-trash"></i>Delete</button>
                                        </form>

                                        <form action="{{ route('reply.edit', $reply->id) }}" method="GET">
                                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Edit</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="flex flex-row space-x-3">
                        <form action="{{ route('thread.destroy', $thread->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>

                        <form action="{{ route('thread.edit', $thread->id) }}" method="GET">
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Edit</button>
                        </form>
                        <form action="{{ route('komen.create', ['thread_id' => $thread->id]) }}" method="GET">
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Comment</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>data threads masih kosong</p>

        @endif
    </div>
</x-app-layout>
