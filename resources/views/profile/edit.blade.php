@section('tittle', 'profil')
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot> --}}

    <div class="">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6 bg-purple-600 pb-96">
            <div class="p-4 sm:p-8 bg-blue-400 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl bg-yellow-300 mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>


            {{-- halaman edit pasword --}}
            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div> --}}

            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}

            <x-postingan />
            <x-postingan />
        </div>
    </div>
</x-app-layout>
