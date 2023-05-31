<x-app-layout>
    <form class="px-3 py-2" method="post" action="/komen/{{ $komen->id }}" class="mt-6 space-y-6">
        @method('PUT')
        @csrf

        <div>
            <x-input-label for="isi" :value="__('Isi')" />
            <x-text-input id="isi" name="isi" type="text" class="mt-1 block w-full" value="{{ $komen->isi }}"
                required autofocus autocomplete="isi" />
            <x-input-error class="mt-2" :messages="$errors->get('isi')" />
        </div>


        <x-primary-button class="mt-2">{{ __('Edit') }}</x-primary-button>
    </form>
</x-app-layout>
