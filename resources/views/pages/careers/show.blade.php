<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex items-center">
            <div class="text-base mr-auto">
                <x-breadcrumb currentModule="{{__('Applicant (Careers) Management')}}" currentPage="Show" route="{{ route('applicant.index') }}"> 
                    <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    {{ $item->first_name }} {{ $item->last_name }}
                </x-breadcrumb>
            </div>
        </div>

        <div class="mt-12 mx-auto w-3/4">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-4 gap-4">

                        <div class="col-span-2 sm:col-span-2">
                            <x-label for="name" class="font-semibold">Name</x-label>
                            <x-form-input disabled="true" type="text"  name="name" value="{{ $item->first_name }} {{ $item->last_name }}" />
                        </div>

                        <div class="col-span-2 sm:col-span-2">
                            <x-label for="email" class="font-semibold">Email</x-label>
                            <x-form-input disabled="true" type="text" name="email" id="email" value="{{ $item->email }}" />
                        </div>

                        <div class="col-span-2 sm:col-span-2">
                            <x-label for="phone_number" class="font-semibold">Phone Number</x-label>
                            <x-form-input disabled="true" type="text" name="phone_number" id="phone_number" value="{{ $item->phone_number }}" />
                        </div>

                        <div class="col-span-2 sm:col-span-2">
                            <x-label for="position" class="font-semibold">Position</x-label>
                            <x-form-input disabled="true" type="text" name="position" id="position" value="{{ $item->position }}" />
                        </div>

                        <div class="col-span-full sm:col-span-full">
                            <x-label for="additional_comments" class="font-semibold">Additional Comments</x-label>
                            <x-text-area value="{{ $item->additional_comments }}" disabled="true"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>