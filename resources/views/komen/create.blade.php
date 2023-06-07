<x-app-layout>
    <form class="px-3 py-2" method="post" action="{{ route('komen.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="isi" :value="__('Input comment')" />
            <x-text-input id="isi" name="isi" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('isi')" />
            <x-text-input id="isi" name="thread_id" type="hidden" class="mt-1 block w-full"
                value="{{ $thread_id }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('thread_id')" />
        </div>

        <x-primary-button class="mt-2">{{ __('Post') }}</x-primary-button>
    </form>
</x-app-layout>
