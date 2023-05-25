<x-app-layout>
    <form class="px-3 py-2" method="post" action="/thread/{{ $thread->id }}" class="mt-6 space-y-6">
        @method('PUT')
        @csrf

        <div>
            <x-input-label for="name" :value="__('Judul')" />
            <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" value="{{ $thread->judul }}"
                required autofocus autocomplete="judul" />
            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
        </div>

        <div>
            <x-input-label for="lokasi" :value="__('Lokasi')" />
            <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full"
                value="{{ $thread->lokasi }}" required autofocus autocomplete="judul" />
            <x-input-error class="mt-2" :messages="$errors->get('lokasi')" />
        </div>

        <div>
            <x-input-label for="isi" :value="__('Isi')" />
            <x-text-input id="isi" name="isi" type="text" class="mt-1 block w-full"
                value="{{ $thread->isi }}" required autofocus autocomplete="isi" />
            <x-input-error class="mt-2" :messages="$errors->get('isi')" />
        </div>


        <x-primary-button class="mt-2">{{ __('Edit') }}</x-primary-button>
        {{-- <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div> --}}
    </form>
</x-app-layout>
