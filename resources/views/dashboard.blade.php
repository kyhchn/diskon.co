@section('tittle', 'dashboard')


<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 font-bold  dark:text-gray-100 text-center">
                    {{ __('Halo selamat datang di diskon.co') }}
                </div> --}}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 ">
        <div class="">
            <img class=" w-full" src="{{ asset('assets/dashboard.svg') }}" alt=""kon.co </div>
        </div>
        <div class="ms-4 my-auto">
            <h1 class="text-5xl leading-tight font-bold ">Diskon.co: Cashback & Kode Promo - semua dalam satu tempat!
            </h1>
            <h1 class=" text-3xl mt-10"> <b> Gabung sekarang gratis</b> dan bagikan cerita hidup hemat Anda!
            </h1>
        </div>
</x-app-layout>
