<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
      @if (session('status'))
      <div class="mb-4 font-medium text-sm text-green-600">
         {{ session('status') }}
      </div>
      @endif
      <div class="w-full px-6 py-8 md:px-8">
        <x-jet-validation-errors class="mb-4" />
<div class="text-center flex justify-center py-2">
          <x-jet-authentication-card-logo />
      </div>
      <p class="text-xl text-center text-gray-600 dark:text-gray-200">Welcome to Exova!</p>
      <div class="flex items-center justify-between mt-4">
         <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
         <a class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">sign up with email</a>
         <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
      </div>
      <form method="POST" action="{{ route('register') }}">
         @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
         <div class="mt-8">
            <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
            Register
            </button>
         </div>
      </form>
      <div class="flex items-center justify-between mt-4">
         <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
         <a href="{{ url('login') }}" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">Sign In</a>
         <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
      </div>
      </div>
    </x-jet-authentication-card>
</x-guest-layout>
