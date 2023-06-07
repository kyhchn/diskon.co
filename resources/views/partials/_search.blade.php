{{-- <form action="{{ route('thread.search') }}">
    <div class="relative border-1 border-black rounded-lg mt-2 ms-3">
        <input type="text" name="search"
            class="h-11 w-full pl-5 pr-20 rounded-full  z-0 focus:shadow focus:outline-none" placeholder="Cari Diskon" />
        <div class="absolute top-2 right-2">
            <button type="submit" class="h-7 w-16 text-black rounded-full bg-red-500 hover:bg-red-600">
                Cari
            </button>
        </div>
    </div>
</form> --}}
<form action="{{ route('thread.search') }}">
    <div class="relative border-1 border-black rounded-lg mt-2 ms-3">
        <input type="text" name="search"
            class="h-11 w-full pl-5 pr-20 rounded-full z-0 focus:shadow focus:outline-none text-black"
            placeholder="Cari Diskon" />
        <div class="absolute top-2 right-2">
            <button type="submit" class="h-7 w-16 text-black rounded-full bg-red-500 hover:bg-red-600">
                Cari
            </button>
        </div>
    </div>
</form>
