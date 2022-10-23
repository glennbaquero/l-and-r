<x-public-layout>
    <main id="app" class="bg-darkblue bg-opacity-75 flex flex-col from-black justify-center lg:px-8 min-h-screen py-12 sm:px-6 text-gray-50 to-gray-100">

        <div class="mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl leading-9">
              Create Account
            </h2>
        </div>
        
        <!-- Main Content -->
        <x-slot name="title">
            
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" class="font-bold font-medium text-center text-lg"/>

        <form-registration url="{{ route('register') }}" v-slot="{ actionHandler, payload, result, loading }">
            
        </form-registration>
    </main>
    
</x-public-layout>
