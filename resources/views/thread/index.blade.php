@section('tittle', 'Thread')


<x-app-layout>
    {{-- @include('partials._search') --}}

    <div class="px-4 py-4">
        @if (isset($threads))
            @foreach ($threads as $thread)
                {{-- postingan --}}
                <div class="container my-3 mx-auto  w-500 rounded-md px-5 py-5 bg-white ">

                    {{-- <h1>{{ auth()->user()->id }}</h1> --}}
                    {{-- bagian nama --}}
                    <p class=" text-lg pb-2">
                        <span class="text-xl font-bold">{{ $thread->user->username }}</span>

                        {{-- waktu postingan --}}
                        <span class="ps-1 text-slate-400">{{ substr($thread->user->updated_at, 0, 10) }}</span>
                    </p>
                    {{-- end of bagian nama --}}

                    {{-- images --}}
                    <img class="" src="{{ asset('assets/postingan1.svg') }}" alt="Gambar Thread">
                    {{-- end of images --}}

                    {{-- konten thread --}}
                    <div class=" py-4">
                        <div class="font-bold text-xl mb-0">{{ $thread->judul }}</div>
                        <div class="font-thin text-xs mt-0 mb-2 text-slate-400">{{ $thread->lokasi }}</div>

                        <p class="text-gray-700 text-base">{{ $thread->isi }}</p>
                    </div>
                    {{-- end of konten thread --}}

                    <div class=" py-4 flex justify-normal ">


                        {{-- button comment --}}


                        <div x-data="{ showText: false }" class="  ">
                            <button @click="showText = !showText"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full ">
                                <span>
                                    <img src="{{ asset('assets/iconComment.svg') }}" alt=""
                                        class="inline-block align-middle mr-2">
                                    comment
                                </span>
                            </button>

                            {{-- comment --}}
                            <div x-show="showText" class="text-black">
                                @foreach ($thread->komen as $komen)
                                    <div class="container my-1 px-2  rounded-md bg-slate-200 py-2 w-300">
                                        <h1 class=" font-bold">{{ $komen->user->username }} </h1>

                                        <p>{{ $komen->isi }}</p>
                                        <div class="flex flex-row space-x-3">
                                            <form action="{{ route('komen.destroy', $komen->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                @if ($komen->user_id == auth()->user()->id)
                                                    <button class="text-red-500">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Delete Comment
                                                    </button>
                                                @endif
                                            </form>

                                            @if ($komen->user_id == auth()->user()->id)
                                                <form action="{{ route('komen.edit', $komen->id) }}" method="GET">
                                                    <button class="text-blue-500"><i
                                                            class="fa-solid fa-trash"></i>Edit</button>
                                                </form>
                                            @endif
                                            <form action="{{ route('reply.create', $komen->id) }}" method="GET">
                                                <button class="text-blue-500"><i
                                                        class="fa-solid fa-trash"></i>Reply</button>
                                            </form>
                                        </div>

                                        {{-- reply --}}
                                        <button class="text-blue-500 my-2 px-2 ps-5"
                                            onclick="toggleReply('{{ $komen->id }}')">show reply</button>
                                        <section id="{{ $komen->id }}" style="display: none;">
                                            @foreach ($komen->reply as $reply)
                                                {{-- button reply --}}

                                                {{-- balasan --}}
                                                <div id="reply-{{ $reply->id }}" class="bg-gray-200 reply-item">
                                                    <div class="container my-1 px-2 rounded-md  ms-5">
                                                        <p class="font-bold">{{ $reply->user->username }}</p>
                                                        <p>{{ $reply->isi }}</p>
                                                        <div class="flex flex-row space-x-3">
                                                            @if ($reply->user_id == auth()->user()->id)
                                                                <form action="{{ route('reply.destroy', $reply->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="text-blue-500"><i
                                                                            class="fa-solid fa-trash"></i>Delete
                                                                        Reply</button>
                                                                </form>

                                                                <form action="{{ route('reply.edit', $reply->id) }}"
                                                                    method="GET">
                                                                    <button class="text-blue-500"><i
                                                                            class="fa-solid fa-trash"></i>Edit</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </section>

                                        <script>
                                            function toggleReply(id) {
                                                var section = document.getElementById(id);
                                                if (section.style.display === "none") {
                                                    section.style.display = "block";
                                                } else {
                                                    section.style.display = "none";
                                                }
                                            }
                                        </script>

                                        {{-- end of reply --}}

                                        {{-- end of reply --}}

                                        {{-- tambahkan komen --}}


                                    </div>
                                @endforeach
                                {{-- komen inputan --}}
                                {{-- <form class="px-3 py-2" method="post" action="{{ route('komen.store') }}"
                                    class="mt-6 space-y-6">
                                    @csrf

                                    <div>
                                        <x-input-label for="isi" :value="__('Isi')" />
                                        <x-text-input id="isi" name="isi" type="text"
                                            class="mt-1 block w-full" required autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('isi')" />
                                        <x-text-input id="isi" name="thread_id" type="hidden"
                                            class="mt-1 block w-full" value="{{ $thread_id }}" required autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('thread_id')" />
                                    </div>

                                    <x-primary-button class="mt-2">{{ __('Post') }}</x-primary-button>
                                </form> --}}
                                {{-- end of komen inputan --}}
                                <form action="{{ route('komen.create', ['thread_id' => $thread->id]) }}"
                                    method="GET">
                                    <button class="text-blue-500"><i class="fa-solid fa-trash "></i> Add
                                        Comment</button>
                                </form>
                            </div>

                        </div>
                        {{-- end comment --}}




                        {{-- end ofbutton comment --}}

                    </div>

                    {{-- @foreach ($thread->komen as $komen)
                    @endforeach --}}
                    @if ($thread->user_id == auth()->user()->id)
                        <div class="flex flex-row space-x-3 ">
                            <form action="{{ route('thread.destroy', $thread->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-blue-500"><i class="fa-solid fa-trash"></i>Delete Thread</button>
                            </form>

                            <form action="{{ route('thread.edit', $thread->id) }}" method="GET">
                                <button class="text-blue-500"><i class="fa-solid fa-trash"></i>Edit</button>
                            </form>
                            {{-- <form action="{{ route('komen.create', ['thread_id' => $thread->id]) }}" method="GET">
                                <button class="text-blue-500"><i class="fa-solid fa-trash"></i>Comment</button>
                            </form> --}}
                        </div>
                    @endif
                </div>
                {{-- end of postingan --}}
            @endforeach
        @else
            <p>data threads masih kosong</p>

        @endif
    </div>

</x-app-layout>
{{-- <script>
    function toggleReply(id) {
        const replyDivs = document.getElementById(id);
        console.log(id);
        replyDivs.classList.toggle('hidden');
    }
</script> --}}
