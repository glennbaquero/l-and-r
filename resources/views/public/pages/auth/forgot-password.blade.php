<x-public-layout>
    <main id="app" class="bg-darkblue bg-opacity-75 flex flex-col from-black justify-center lg:px-8 min-h-screen py-12 sm:px-6 text-gray-50 to-gray-100">

        <div class="mx-auto sm:w-full sm:max-w-md ">
            <h2 class="mt-6 text-center text-3xl leading-9">
              Forgot Password
            </h2>
        </div>

        <x-slot name="title">
            Forgot your Password?
        </x-slot>

        <!-- Session Status -->

        <div class="mt-10 mx-auto sm:w-full sm:max-w-md">
            <div class="mb-3 px-4 sm:px-10 text-sm">
                <x-auth-session-status class="mb-4" :status="session('status')" class="font-bold font-medium text-center text-lg"/>
                {{ __('Enter your email address below and we\'ll send you instructions to reset your password') }}
            </div>

            <div class="py-8 px-4 sm:rounded-lg sm:px-10">
                <!-- Session Status -->
                <form action="{{ route('travel.password.email') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium leading-5 mb-2 @error('email') text-red-500 @enderror">
                            {{ __('Email')}}
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2 @error('email') text-red-500 @enderror">
                                <span class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>                   
                                </span>
                            </span>

                            <input type="email" id="email" name="email" value="{{old('email')}}" required class="appearance-none block w-full pl-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-8 @error('email') border-red-500 @enderror" />
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mt-10">
                        <span class="block w-full shadow-sm">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out sm:leading-8">
                                {{ __('Submit') }}
                            </button>
                        </span>
                    </div>

                    <div class="mt-4 text-center">            
                        <div class="text-sm leading-5">
                            <a href="{{ route('travel.login') }}" class="font-medium focus:outline-none focus:underline transition ease-in-out duration-150">
                                {{ __('Sign-in instead?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-public-layout>
