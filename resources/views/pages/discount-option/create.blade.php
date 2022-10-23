<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex items-center">
            <div class="text-base mr-auto">

                <x-breadcrumb currentModule="{{__('Discounts and Increase Options')}}" route="{{ route('discount-option.index') }}"></x-breadcrumb>
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
                    <form action="{{ route('discount-option.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="option_type" class="font-semibold">Option Type</x-label>
                                <x-select :lists="$types" name="option_type" identifierValue="label" display="label" oldValue="{{ old('option_type') }}"/>
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="option_name" class="font-semibold">Option Name</x-label>
                                <x-form-input type="text" name="option_name" id="option_name" value="{{ old('option_name') }}" />
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