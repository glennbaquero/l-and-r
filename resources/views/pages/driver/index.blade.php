<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex items-center">
            <div class="text-base mr-auto">
                <span class="font-semibold mr-3">{{__('Driver Management')}}</span>
            </div>
            {{-- <div class="flex text-base items-center">
                <a href="{{ route('driver.create') }}" class="inline-flex font-normal items-center px-4 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-white bg-lightblue hover:bg-lighterblue focus:outline-none focus:border-lighterblue focus:shadow-outline-lighterblue active:bg-lighterblue transition ease-in-out duration-150">
                    {{__('New Driver')}}
                </a>
            </div> --}}
        </div>
        <div class="flex items-center mt-4">
            <div class="flex text-base items-center">
                <a href="{{ route('driver.create') }}" class="inline-flex font-normal items-center px-4 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-white bg-lightblue hover:bg-lighterblue focus:outline-none focus:border-lighterblue focus:shadow-outline-lighterblue active:bg-lighterblue transition ease-in-out duration-150">
                    {{__('New Driver')}}
                </a>
            </div>
        </div>

        <div class="mt-12 mx-auto">
            <data-table v-slot="{ params, setParam, data, links, meta, next, prev, loading }"
                        :searches="{{json_encode($searches)}}"
                        url="{{route('driver.fetch')}}"
            >
                <x-table :headers="$headers">
                    <x-slot name="body">
                        <tr>
                            <td class="text-center border-b-2 border-gray-300 px-3">
                                <input @input="setParam('name', $event.target.value)" name="name" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none" />
                            </td>
                            <td class="text-center border-b-2 border-gray-300 px-3">
                                <input @input="setParam('document_no', $event.target.value)" name="document_no" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none" />
                            </td>
                            <td colspan="1" class="text-center border-b-2 border-gray-300 px-3">
                                <select @input="setParam('license_type', $event.target.value)" name="license_type" class="form-input w-full mx-auto my-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent">
                                    <option></option>
                                    @foreach($licenseTypes as $type) 
                                        <option value="{{ $type }}"> {{ $type }} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center border-b-2 border-gray-300 px-3">
                                <input @input="setParam('license_no', $event.target.value)" name="license_no" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none" />
                            </td>
                            <td class="text-center border-b-2 border-gray-300 px-3">
                                <input @input="setParam('phone_number', $event.target.value)" name="phone_number" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none" />
                            </td>
                            <td colspan="2" class="text-center border-b-2 border-gray-300 px-3"></td>
                        </tr>
                        <template v-if="data.length > 0">
                            <tr v-for="(driver, key) in data" :key="key" class="hover:bg-gray-100 cursor-pointer">
                                <td class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    @{{driver.fullname}}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    @{{driver.document_no}}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    @{{driver.license_type}}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    @{{driver.license_no}}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    @{{driver.phone_number}}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    @{{driver.address}}
                                </td>
                                <td class="px-6 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-500 flex py-5">
                                    <delete-button :url="driver.deleteUrl"></delete-button>
                                    <a :href="driver.showUrl" class="focus:outline-none focus:shadow-outline inline-flex">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>

                                </td>
                            </tr>
                            <!--Pagination-->
                            <tr>
                                <td colspan="1" class="px-6 py-2 whitespace-no-wrap text-left border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    Showing @{{meta.from}} to @{{meta.to}} of @{{meta.total}}
                                </td>
                                <td colspan="7" class="px-6 py-2 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    <button @click="prev" class="relative inline-flex items-center px-4 py-2 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 disabled:opacity-50" :disabled="!links.prev">
                                        Previous
                                    </button>
                                    <button @click="next" class="ml-3 relative inline-flex items-center px-4 py-2 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 disabled:opacity-50" :disabled="!links.next">
                                        Next
                                    </button>
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td colspan="8" class="px-6 py-2 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                    No Record . . .
                                </td>
                            </tr>
                        </template>
                    </x-slot>
                </x-table>
            </data-table>
        </div>
    </div>
</x-app-layout>