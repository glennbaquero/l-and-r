<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex items-center">
            <div class="text-base mr-auto">

                <x-breadcrumb currentModule="{{__('FAQ')}}" currentPage="Show" route="{{ route('faq.index') }}"> 
                    <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    {{ $faq->title }}
                </x-breadcrumb>
            </div>
        </div>
        @if(Session::has('success'))
            <x-alert message="{{ Session::get('success') }}" />
        @elseif(Session::has('errors'))
            <x-alert message="Error encountered" type="error" >
                @if ($errors->any())
                    <ul class="list-inside list-disc text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </x-alert>
        @endif

        <div class="mt-12 mx-auto w-3/4">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="promotion_apply_to" class="font-semibold">Section</x-label>
                                <select name="section" class="form-input w-full mx-auto my-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" >
                                    <option disabled selected>Select your option</option>
                                    <option value="departures" {{ 'departures' === $faq->section ? 'selected' : '' }}>Departure</option>
                                    <option value="pricing" {{ 'pricing' === $faq->section ? 'selected' : '' }}>Pricing</option>
                                    <option value="other" {{ 'other' === $faq->section ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="title" class="font-semibold">Title</x-label>
                                <x-form-input type="text" name="title" id="title" value="{{ $faq->title }}" />
                            </div>
                            <div class="col-span-full sm:col-span-full">
                                <x-label for="content" class="font-semibold">Content</x-label>
                                <x-text-area name="content" value="{{ $faq->content }}" />
                            </div>
                        </div>
                        <div class="mt-5 text-rleftight">
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-darkblue focus:outline-none focus:border-red-300 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5 w-36">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>