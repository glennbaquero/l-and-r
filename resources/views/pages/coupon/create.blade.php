<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex items-center">
            <div class="text-base mr-auto">

                <x-breadcrumb currentModule="{{__('Coupon Management')}}" route="{{ route('coupon.index') }}"></x-breadcrumb>
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
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf
                        <toggle :item="{{ auth()->user() }}" :hasParentToggle="0" :toshowdata="0" v-slot="{ display, toggled }">
                            <div>
                                <div class="grid grid-cols-6 gap-2">
                                    <div class="col-span-3 sm:col-span-3">
                                        <x-label for="" class="font-semibold">Coupon Code</x-label>
                                        <div class="flex items-center space-x-3 mt-2">
                                            <span id="toggleLabel">
                                                <span class="text-sm leading-5 font-medium text-gray-900">Manual </span>
                                            </span>
                                            <!-- On: "bg-green-500", Off: "bg-red-500" -->
                                            <span  @click="toggled" role="checkbox" tabindex="0" aria-checked="false" aria-labelledby="toggleLabel" :class="display ? 'bg-green-500' : 'bg-red-500'" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                                                <!-- On: "translate-x-5", Off: "translate-x-0" -->
                                                <span aria-hidden="true" :class="display ? 'translate-x-5' : 'translate-x-0'" class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                                            </span>

                                            <span id="toggleLabel">
                                                <span class="text-sm leading-5 font-medium text-gray-900">Auto Generated  </span>
                                            </span>
                                            <input type="checkbox" name="is_autogenerated" :checked="display" class="hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-2" v-if="!display">
                                    <div class="col-span-3 sm:col-span-3">
                                        <x-label for="code" class="font-semibold">Code</x-label>
                                        <x-form-input type="text" name="code" id="code" value="{{ old('code') }}" />
                                    </div>
                                </div>
                            </div>
                        </toggle>

                        <div class="grid grid-cols-6 gap-2">
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="promotion_name" class="font-semibold">Promotion Name</x-label>
                                <x-form-input type="text" name="promotion_name" id="promotion_name" value="{{ old('promotion_name') }}" />
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="promotion_alias" class="font-semibold">Promotion Alias</x-label>
                                <x-form-input type="text" name="promotion_alias" id="promotion_alias" value="{{ old('promotion_alias') }}" />
                            </div>

                            <div class="col-span-2 sm:col-span-2">
                                <x-label for="applies_to" class="font-semibold">Coupon Applies To</x-label>
                                <x-select :lists="$applies_to" name="applies_to" identifierValue="label" display="label" oldValue="{{ old('coupon_type') }}"/>
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <x-label for="coupon_type" class="font-semibold">Coupon Type</x-label>
                                <x-select :lists="$coupon_type" name="coupon_type" identifierValue="label" display="label" oldValue="{{ old('coupon_type') }}"/>
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <x-label for="value" class="font-semibold">Value</x-label>
                                <x-form-input type="number" min="0" step="any" name="value" id="value" value="{{ old('value') }}" />
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-2">
                            <div class="col-span-2 sm:col-span-2">
                                <x-label for="number_of_coupons" class="font-semibold"># of Coupons</x-label>
                                <x-form-input type="number" min="0" step="any" name="number_of_coupons" id="number_of_coupons" value="{{ old('number_of_coupons') }}" />
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <x-label for="coupon_used" class="font-semibold">Coupon Used</x-label>
                                <x-form-input type="number" min="0" step="any" name="coupon_used" id="coupon_used" value="0"  readonly/>
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <x-label for="coupon_available" class="font-semibold">Coupon Available</x-label>
                                <x-form-input type="number" min="0" step="any" name="coupon_available" id="coupon_available" value="0" readonly />
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="max_purchase_per_client" class="font-semibold">Maximum Purchase per Client</x-label>
                                <x-form-input type="number" min="0" step="any" name="max_purchase_per_client" id="max_purchase_per_client" value="{{ old('max_purchase_per_client') }}" />
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <x-label for="max_per_bus" class="font-semibold">Maximum per Bus</x-label>
                                <x-form-input type="number" min="0" step="any" name="max_per_bus" id="max_per_bus" value="{{ old('max_per_bus') }}" />
                            </div>
                        </div>

                        <toggle-select v-slot="{ display, toggle, toggleFalse,selectChanged, voucherType }">
                            <div>
                                <div class="grid grid-cols-6 gap-2">
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-label for="filter_by_date" class="font-semibold">Filter by date</x-label>
                                        <x-select :lists="$filter_date" name="filter_by_date" identifierValue="label" display="label" @change="selectChanged({{$filter_date}}, $event.target.value, 'voucher')"/>
                                    </div>
                                </div>

                                <toggle-select  v-if="voucherType === 'Travel' || voucherType === 'Both'" v-slot="{ display, toggled, toggleFalse,selectChanged, voucherType }">
                                    <div>
                                        <div class="grid grid-cols-6 gap-2">
                                            <div class="col-span-2 sm:col-span-2">
                                                <x-label for="trip_filter" class="font-semibold">Filter by date of trip</x-label>
                                                <x-select :lists="$filter_by" name="trip_filter" identifierValue="label" display="label" selected="Day" @change="toggled"/>
                                            </div>

                                            <div class="col-span-2 sm:col-span-2" >
                                                <x-label for="trip_date" class="font-semibold">@{{ display ? 'Start Date' : 'Date' }}</x-label>
                                                <x-datepicker name="trip_date"/>
                                            </div>

                                            <div class="col-span-2 sm:col-span-2" v-if="display">
                                                <x-label for="trip_end_date" class="font-semibold">End Date</x-label>
                                                <x-datepicker name="trip_end_date"/>
                                            </div>
                                        </div>

                                        <toggle-select  v-if="display" v-slot="{ display, toggled, toggleFalse, selectChanged }">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-2 sm:col-span-2">
                                                    <x-label for="trip_filter_day" class="font-semibold">Days</x-label>
                                                    <x-select :lists="$filter_day_range" name="trip_filter_day" identifierValue="label" display="label" selected="All" @change="selectChanged({{$filter_day_range}}, $event.target.value, 'promotion')"/>
                                                </div>
                                                <div class="col-span-3 sm:col-span-3" v-if="display">
                                                    <x-label for="trip_days" class="font-semibold">Filter Day</x-label>
                                                    <multi-select :items="{{ $day_list }}" :multiple="true" name="trip_days" :multiple="false" label="label"></multi-select>
                                                </div>
                                            </div>
                                        </toggle-select>
                                    </div>
                                </toggle-select>

                                <toggle-select  v-if="voucherType === 'Purchase' || voucherType === 'Both'" v-slot="{ display, toggled, toggleFalse,selectChanged, voucherType }">
                                    <div>
                                        <div class="grid grid-cols-6 gap-2">
                                            <div class="col-span-2 sm:col-span-2">
                                                <x-label for="purchase_date_filter" class="font-semibold">Filter by Purchase Date</x-label>
                                                <x-select :lists="$filter_by" name="purchase_date_filter" identifierValue="label" display="label" selected="Day" @change="toggled"/>
                                            </div>

                                            <div class="col-span-2 sm:col-span-2" >
                                                <x-label for="purchase_date" class="font-semibold">@{{ display ? 'Start Date' : 'Date' }}</x-label>
                                                <x-datepicker name="purchase_date"/>
                                            </div>

                                            <div class="col-span-2 sm:col-span-2" v-if="display">
                                                <x-label for="purchase_end_date" class="font-semibold">End Date</x-label>
                                                <x-datepicker name="purchase_end_date"/>
                                            </div>
                                        </div>

                                        <toggle-select  v-if="display" v-slot="{ display, toggled, toggleFalse, selectChanged }">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-2 sm:col-span-2">
                                                    <x-label for="purchase_date_filter_day" class="font-semibold">Days</x-label>
                                                    <x-select :lists="$filter_day_range" name="purchase_date_filter_day" identifierValue="label" display="label" selected="All" @change="selectChanged({{$filter_day_range}}, $event.target.value, 'promotion')"/>
                                                </div>
                                                <div class="col-span-3 sm:col-span-3" v-if="display">
                                                    <x-label for="purchase_date_days" class="font-semibold">Filter Day</x-label>
                                                    <multi-select :items="{{ $day_list }}" :multiple="true" name="purchase_date_days" :multiple="false" label="label"></multi-select>
                                                </div>
                                            </div>
                                        </toggle-select>
                                    </div>
                                </toggle-select>


                                <toggle-select v-slot="{ display, toggled, toggleFalse, selectChanged, show_part_of_route, show_routes }">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-label for="apply_to" class="font-semibold">Apply To</x-label>
                                            <x-select :lists="$apply_to_filter" name="apply_to" identifierValue="label" display="label" selected="All Routes" @change="selectChanged({{$apply_to_filter}}, $event.target.value, 'promotion_apply_to_filter')"/>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2" v-if="show_part_of_route">
                                            <x-label for="departure_id" class="font-semibold">Departure</x-label>
                                            <multi-select :items="{{ $cities }}" :multiple="true" name="departure_id" :multiple="false" label="name" v-slot="{ selected }"></multi-select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-2" v-if="show_part_of_route">
                                            <x-label for="arrival_id" class="font-semibold">Arrival</x-label>
                                            <multi-select :items="{{ $cities }}" :multiple="true" name="arrival_id" :multiple="false" label="name" v-slot="{ selected }"></multi-select>
                                        </div>

                                        <div class="col-span-3 sm:col-span-3" v-if="show_routes">
                                            <x-label for="route_ids" class="font-semibold">Route</x-label>
                                            <multi-select :items="{{ $routes }}" :multiple="true" name="route_ids" :multiple="false" label="name" v-slot="{ selected }"></multi-select>
                                        </div>
                                    </div>
                                </toggle-select>

                                <toggle :item="{{ auth()->user() }}" :hasParentToggle="0" :toshowdata="0" v-slot="{ display, toggled }">
                                    <div class="grid grid-cols-6 gap-2">
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-label for="service_ids" class="font-semibold">Service Type</x-label>
                                            <multi-select :items="{{ $services }}" :multiple="true" name="service_ids" :multiple="false" label="name" v-slot="{ selected }"></multi-select>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <x-label for="trip_type" class="font-semibold">Trip Type</x-label>
                                            <multi-select :items="{{ $trip_type }}" :multiple="true" name="trip_type" :multiple="false" label="label" v-slot="{ selected }"></multi-select>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <x-label for="ticket_type_ids" class="font-semibold">Ticket Type</x-label>
                                            <multi-select :items="{{ $ticket_types }}" :multiple="true" name="ticket_type_ids" :multiple="false" label="name" v-slot="{ selected }"></multi-select>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <x-label for="base_fare" class="font-semibold">Base Fare</x-label>
                                            <multi-select :items="{{ $base_fare }}" :multiple="true" name="base_fare" :multiple="false" label="label" v-slot="{ selected }"></multi-select>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <x-label for="" class="font-semibold">Apply Minimum Price</x-label>
                                            <div class="flex items-center space-x-3 mt-4">
                                                <span id="toggleLabelMinPrice">
                                                    <span class="text-sm leading-5 font-medium text-gray-900">No </span>
                                                </span>
                                                <!-- On: "bg-green-500", Off: "bg-red-500" -->
                                                <span  @click="toggled" role="checkbox" tabindex="0" aria-checked="false" aria-labelledby="toggleLabel" :class="display ? 'bg-green-500' : 'bg-red-500'" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                                                    <!-- On: "translate-x-5", Off: "translate-x-0" -->
                                                    <span aria-hidden="true" :class="display ? 'translate-x-5' : 'translate-x-0'" class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                                                </span>

                                                <span id="toggleLabel">
                                                    <span class="text-sm leading-5 font-medium text-gray-900">Yes  </span>
                                                </span>
                                                <input type="checkbox" name="apply_minimum_price" :checked="display" class="hidden">
                                            </div>
                                        </div>

                                        <div class="col-span-2 sm:col-span-2" v-if="display">
                                            <x-label for="minimum_price_value" class="font-semibold">Value</x-label>
                                            <x-form-input type="number" min="0" step="any" name="minimum_price_value" id="minimum_price_value" value="{{ old('minimum_price_value') }}" />
                                        </div>

                                    </div>
                                </toggle>

                                <div class="grid grid-cols-6 gap-2">
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-label for="authorized_by" class="font-semibold">Authorized By</x-label>
                                        <x-select :lists="$users" name="authorized_by" display="fullname" oldValue="{{ old('authorized_by') }}"/>
                                    </div>

                                    <div class="col-span-4 sm:col-span-4">
                                        <x-label for="description" class="font-semibold">Description</x-label>
                                        <x-text-area name="description" id="description"/>
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 gap-2">
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-switch label="Daily Restart" name="daily_restart" rightLabel="Activate" leftLabel="Deactivate" type="modified"/>
                                    </div>

                                    <div class="col-span-2 sm:col-span-2">
                                        <x-switch label="Apply to Multiroute" name="apply_multiroute" rightLabel="Activate" leftLabel="Deactivate" type="modified"/>
                                    </div>
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-switch label="Apply by Section" name="apply_by_section" rightLabel="Activate" leftLabel="Deactivate" type="modified"/>
                                    </div>

                                </div>

                            </div>
                            


                        </toggle-select>

                        

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