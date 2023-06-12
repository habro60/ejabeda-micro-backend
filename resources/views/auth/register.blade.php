<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Organization Name')" />
                
                <x-input id="org_name" class="block mt-1 w-full" type="text" name="org_name" :value="old('org_name')" required autofocus />

                <x-label for="name" :value="__('Organization Number')" />

                <x-input id="org_number" class="block mt-1 w-full" type="number" name="org_number" :value="get_org_number()??old('org_number')" required autofocus readonly />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-label for="contact_no" :value="__('Contact_no')" />

                <x-input id="contact_no" class="block mt-1 w-full" type="text" name="contact_no" :value="old('contact_no')" required />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Address')" />
            <x-textarea name="address" class="fromform-control" />

            </div>

 

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
