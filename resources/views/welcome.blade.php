<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <form method="POST" action="{{ route('search-files') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-input-label for="folder" :value="__('Enter the folder name')"/>

                <x-text-input id="folder" class="block mt-1 w-full" type="text" name="folder" :value="old('folder')"
                              required autofocus/>

                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>



            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Search files in folder') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
