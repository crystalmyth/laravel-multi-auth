<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Set Your Password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form-card class="p-3 col-start-4 col-end-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('setpassword.store') }}">
                    <h1 class="py-3 font-bold uppercase">Set Password</h1>
                    @csrf

                    <!-- Password -->
                    <div class="mb-3">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full py-2" type="password" name="password"  />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-label for="password_confirmation" :value="__('Password Confirmation')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full py-2" type="password" name="password_confirmation"  />
                    </div>

                    <x-button class="ml-3 mt-3">
                        {{ __('Set Password') }}
                    </x-button>
                </form>
            </x-form-card>
        </div>
    </div>
</x-app-layout>
