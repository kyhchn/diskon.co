<nav x-data="{ open: false }" class=" fixed top-0 left-0 w-full text-white p-4 bg-white" id="navbar">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-0 ">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                {{-- <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}
                <!-- Navigation Links  to thread-->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('thread.index')" :active="request()->routeIs('thread.index')">
                        {{ __('Thread') }}
                    </x-nav-link>
                </div>
                <!-- Navigation Links  to your thread-->
                {{-- <x-nav-link :href="route('thread.edit', ['thread' => $thread->id])" :active="request()->routeIs('thread.edit')">
                    {{ __('Your Thread') }}
                </x-nav-link> --}}


            </div>
            <div>
                @include('partials._search')

            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 ">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-full text-gray-500 dark:text-gray-400 border-black border dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 ">
                            <div class=" flex items-center "> <img src="{{ asset('assets/logoProfile.svg') }}"
                                    alt="">
                                <span class=" ps-2">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>

                            <div class="ml-1 ">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="'/thread/' . auth()->user()->username">
                            {{ __('My Thread') }}
                        </x-dropdown-link>


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    ada

</nav>

<div class=" w-1/2  mx-auto mt-7  mb-5">
    {{-- <div class="flex justify-center items-center w-10/12 bg-slate-200 mx-auto py-2 rounded-lg drop-shadow-lg">
        <div class="rounded-full bg-slate-500 w-12 h-12"></div>
        <a href="#" class="rounded-full bg-slate-500 ml-4 py-2 px-5 w-10/12 text-left" onclick="showPopup()">Buat
            Postingan baru</a>
    </div> --}}
    <div class="fixed bottom-4 right-4">
        <button
            class="bg-slate-500 text-white rounded-full w-12 h-12 flex justify-center items-center transition-all duration-300 hover:scale-110"
            onclick="showPopup()">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
        </button>
    </div>


    <div id="popup" class=" hidden   fixed inset-0 bg-none  bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-500">
            <h2 class="text-xl font-bold mb-4">Buat postingan thread baru anda!</h2>
            <form class="px-3 py-2" method="post" action="{{ route('thread.store') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Judul')" />
                    <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full"
                        :value="old('judul')" required autofocus autocomplete="judul" />
                    <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                </div>

                <div>
                    <x-input-label for="lokasi" :value="__('Lokasi')" />
                    <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full"
                        :value="old('lokasi')" required autofocus autocomplete="lokasi" />
                    <x-input-error class="mt-2" :messages="$errors->get('lokasi')" />
                </div>

                <div>
                    <x-input-label for="isi" :value="__('Isi')" />
                    <x-text-input id="isi" name="isi" type="text" class="mt-1 block w-full"
                        :value="old('isi')" required autofocus autocomplete="isi" />
                    <x-input-error class="mt-2" :messages="$errors->get('isi')" />
                </div>

                <div></div>
                <x-primary-button class="mt-2">{{ __('Post') }}</x-primary-button>
                {{-- cancell --}}
                <button
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    onclick="hidePopup()">cancel</button>
            </form>
        </div>
    </div>

</div>




<script>
    function showPopup() {
        var popup = document.getElementById('popup');
        popup.classList.remove('hidden');
    }

    function hidePopup() {
        var popup = document.getElementById('popup');
        popup.classList.add('hidden');
    }

    let prevScrollPos = window.pageYOffset;
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        const currentScrollPos = window.pageYOffset;

        if (prevScrollPos > currentScrollPos) {
            navbar.classList.remove('hidden');
        } else {
            navbar.classList.add('hidden');
        }

        prevScrollPos = currentScrollPos;
    });
</script>
