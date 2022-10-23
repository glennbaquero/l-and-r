<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex items-center">
            <div class="text-base mr-auto">

                <x-breadcrumb currentModule="{{__('FAQ')}}" route="{{ route('faq.index') }}"></x-breadcrumb>
            </div>
        </div>


        @if(Session::get('errors'))
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
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="section" class="font-semibold">Section</x-label>
                                <select name="section" class="form-input w-full mx-auto my-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" >
                                    <option disabled selected>Select your option</option>
                                    <option value="departures" >Departure</option>
                                    <option value="pricing" >Pricing</option>
                                    <option value="other" >Other</option>
                                </select>
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="title" class="font-semibold">Title</x-label>
                                <x-form-input type="text" name="title" id="title" value="{{ old('title') }}" />
                            </div>
                            <div class="col-span-full sm:col-span-full">
                                <x-label for="content" class="font-semibold">Content</x-label>
                                <x-text-area name="content" value="{{ old('content') }}" />
                            </div>
                        </div>
                        <div class="mt-5 text-left">
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