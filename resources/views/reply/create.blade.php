<x-app-layout>
    <form class="px-3 py-2" method="post" action="/reply" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="isi" :value="__('Reply')" />
            <x-text-input id="isi" name="isi" type="text" class="mt-1 block w-full" required autofocus
                autocomplete="judul" />
            <x-input-error class="mt-2" :messages="$errors->get('isi')" />
            <x-text-input id="isi" name="komen_id" type="hidden" class="mt-1 block w-full"
                value="{{ $komen_id }}" required autofocus />
        </div>

        <x-primary-button class="mt-2">{{ __('Post') }}</x-primary-button>
    </form>
</x-app-layout>
