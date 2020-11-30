<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-right">
                <x-button-link :href="route('tenants.index')">All Tenants</x-button-link>
            </div>
            <x-form-card class="p-3 col-start-4 col-end-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('tenants.store') }}">
                    <h1 class="py-3 font-bold uppercase">Add Tenant</h1>
                    @csrf
                    <!-- Name -->
                    <div class="mb-3">
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full py-2" type="text" name="name" :value="old('name')"  />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full py-2" type="email" name="email" :value="old('email')"  />
                    </div>

                    <!-- Contact -->
                    <div class="mb-3">
                        <x-label for="contact" :value="__('Contact')" />

                        <x-input id="contact" class="block mt-1 w-full py-2" type="text" name="contact" :value="old('contact')"  />
                    </div>

                    <!-- Domain -->
                    <div class="mb-3">
                        <x-label for="domain" :value="__('Domain')" />

                        <x-input id="domain" class="block mt-1 w-full py-2" type="text" name="domain" :value="old('domain')"  />
                    </div>

                    <x-button class="ml-3 mt-3">
                        {{ __('Create Account') }}
                    </x-button>
                </form>
            </x-form-card>
        </div>
    </div>
</x-app-layout>
