@props(['thread'])
@props(['komen'])

<div class=" bg-white border-2 border-black rounded-lg overflow-hidden shadow-lg p-4 pt-1 w-500 mx-auto ">
    <p class=" text-lg pb-2">
        <span class="text-xl">{{ $thread->user->username }}</span>

        {{-- waktu postingan --}}
        <span class="ps-1 text-slate-400">{{ substr($thread->user->updated_at, 0, 10) }}</span>

    </p>
    <img class="" src="{{ asset('assets/postingan1.svg') }}" alt="Gambar Thread">
    <div class=" py-4">
        <div class="font-bold text-xl mb-2">{{ $thread->judul }}</div>
        <p class="text-gray-700 text-base">{{ $thread->isi }}</p>
    </div>
    <div class=" py-4 flex justify-normal bg-green-600">

        {{-- button like --}}
        <div x-data="{ bgColor: 'bg-blue-500' }">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                :class="bgColor" @click="bgColor = (bgColor === 'bg-blue-500') ? 'bg-red-500' : 'bg-blue-500'">
                <span>
                    <img src="{{ asset('assets/logoLike.svg') }}" alt="" class="inline-block align-middle mr-2">
                    Like
                </span>
            </button>
        </div>


        {{-- button comment --}}
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ml-4">
            <span>
                <img src="{{ asset('assets/iconComment.svg') }}" alt="" class="inline-block align-middle mr-2">
                comment
            </span>
        </button>
    </div>




</div>
