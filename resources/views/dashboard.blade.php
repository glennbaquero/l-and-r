<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8 py-6 text-sm">
        <div class="flex items-center">
            <div class="text-base mr-auto">
                <span class="mr-3">{{__('Welcome')}}</span>
                <span class="font-semibold">{{auth()->user()->fullname}}</span>,
            </div>
            <div class="flex text-base items-center">
                <span class="mr-3">{{__('Your Office')}}</span>
                <update-user-office 
                    :office_id="{{ auth()->user()->office_id }}" 
                    url="{{ route('user-office.update') }}"
                    v-slot="{ actionHandler, payload }">

                    <select class="form-input w-auto mx-auto my-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" v-model="payload.office_id" @change="actionHandler" >
                        @foreach($offices as $office)
                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                    </select>    
               
                </update-user-office>
                

                {{-- <x-dropdown align="right" width="48" class="bg-gray-200 p-2 rounded">
                    <x-slot name="trigger">
                        <button class="flex text-base font-semi-bold text-gray-700 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ auth()->user()->office->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($offices as $office)
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 p-3 bg-lightgray cursor-pointer">
                            {{ $office->name }}
                        </div>
                        @endforeach
                    </x-slot>
                </x-dropdown> --}}
            </div>
        </div>

        <div class="mt-12 grid gap-8 max-w-lg mx-auto lg:grid-cols-8 lg:max-w-none text-center">    
            <a href="{{route('ticket.index')}}" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 -5 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.77778 4H20.2222V12H5.77778V4ZM23.8333 8C23.8333 9.10458 24.8034 10 26 10V14C26 15.1046 25.03 16 23.8333 16H2.16667C0.970035 16 0 15.1046 0 14V10C1.19663 10 2.16667 9.10458 2.16667 8C2.16667 6.89542 1.19663 6 0 6V2C0 0.895416 0.970035 0 2.16667 0H23.8333C25.03 0 26 0.895416 26 2V6C24.8034 6 23.8333 6.89542 23.8333 8ZM21.6667 3.66667C21.6667 3.11437 21.1816 2.66667 20.5833 2.66667H5.41667C4.81835 2.66667 4.33333 3.11437 4.33333 3.66667V12.3333C4.33333 12.8856 4.81835 13.3333 5.41667 13.3333H20.5833C21.1816 13.3333 21.6667 12.8856 21.6667 12.3333V3.66667Z" fill="#001943"/>
                </svg>        
                <span>{{ __('New Ticket') }}</span>
            </a>
            <a href="#" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.28571 3.66667H16.7143V1.83333H9.28571V3.66667ZM4.17857 3.66667V22H3.25C2.36012 22 1.59598 21.6849 0.957589 21.0547C0.319196 20.4245 0 19.6701 0 18.7917V6.875C0 5.99653 0.319196 5.24219 0.957589 4.61198C1.59598 3.98177 2.36012 3.66667 3.25 3.66667H4.17857ZM20.4286 3.66667V22H5.57143V3.66667H7.42857V1.375C7.42857 0.993055 7.56399 0.668403 7.83482 0.401042C8.10565 0.133681 8.43452 0 8.82143 0H17.1786C17.5655 0 17.8943 0.133681 18.1652 0.401042C18.436 0.668403 18.5714 0.993055 18.5714 1.375V3.66667H20.4286ZM26 6.875V18.7917C26 19.6701 25.6808 20.4245 25.0424 21.0547C24.404 21.6849 23.6399 22 22.75 22H21.8214V3.66667H22.75C23.6399 3.66667 24.404 3.98177 25.0424 4.61198C25.6808 5.24219 26 5.99653 26 6.875Z" fill="#001943"/>
                </svg>                                
                <span>{{ __('Luggage') }}</span>
            </a>
            <a href="{{route('seat-transfer.index')}}" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 21.6667L0 26H4.5L4.5 21.6667L19.5 21.6667V26H24V17.3333L0 17.3333L0 21.6667ZM19.5 14.4444L4.5 14.4444L4.5 2.88889C4.5 1.3 5.85 0 7.5 0L16.5 0C18.15 0 19.5 1.3 19.5 2.88889L19.5 14.4444Z" fill="#001943"/>
                </svg>                                                       
                <span>{{ __('Seat Transfer') }}</span>
            </a>
            <a href="{{route('frequent-traveler.index')}}" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 5.92105C6 9.18553 8.692 11.8421 12 11.8421C15.308 11.8421 18 9.18553 18 5.92105C18 2.65658 15.308 0 12 0C8.692 0 6 2.65658 6 5.92105ZM22.6667 25H24V23.6842C24 18.6066 19.812 14.4737 14.6667 14.4737H9.33333C4.18667 14.4737 0 18.6066 0 23.6842V25H22.6667Z" fill="#001943"/>
                </svg>                                                                                 
                <span>{{ __('Frequent Tr.') }}</span>
            </a>
            <a href="#" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.7628 6.52677C22.7592 6.51984 22.7563 6.5128 22.7525 6.506C22.7494 6.50049 22.7456 6.49544 22.7424 6.49004C22.5787 6.20748 22.3453 5.97366 22.0654 5.81191L12.4054 0.241595C12.1289 0.0831953 11.8171 0 11.5 0C11.1829 0 10.8711 0.0831953 10.5946 0.241595L0.9346 5.81191C0.649853 5.97629 0.413251 6.21521 0.249204 6.50401C0.247479 6.50706 0.245409 6.50987 0.243799 6.51292C0.240809 6.51832 0.238509 6.52407 0.235749 6.52947C0.081539 6.80939 0.000364039 7.12502 0 7.44612V18.5525C0.00031078 18.8849 0.0869668 19.2112 0.251141 19.4983C0.415316 19.7854 0.651143 20.023 0.9346 20.1868L10.5946 25.757C10.8518 25.9046 11.1402 25.9868 11.4352 25.9966C11.4536 25.9979 11.4718 25.9998 11.4904 26H11.5002C11.5252 26 11.5497 25.9982 11.5742 25.9962C11.866 25.9851 12.1509 25.9031 12.4054 25.7571L22.0654 20.1866C22.3488 20.0228 22.5847 19.7852 22.7488 19.4982C22.913 19.2111 22.9997 18.8848 23 18.5525V7.44612C22.9996 7.12397 22.9179 6.80734 22.7628 6.52677ZM11.4999 1.87569L20.2185 6.90326L17.1453 8.69597L8.35873 3.68717L11.4999 1.87569ZM11.6168 11.9212L2.79782 6.89376L6.48355 4.76843L15.281 9.78357L11.6168 11.9212ZM12.435 23.5837L12.5367 13.547L16.2304 11.3921V15.4057C16.2304 15.6547 16.3274 15.8934 16.4999 16.0694C16.6724 16.2454 16.9064 16.3443 17.1504 16.3443C17.3944 16.3443 17.6284 16.2454 17.801 16.0694C17.9735 15.8934 18.0704 15.6547 18.0704 15.4057V10.3186L21.1599 8.51635V18.5525L12.435 23.5837Z" fill="#001943"/>
                </svg>
                <span>{{ __('Packaging') }}</span>
            </a>
            <a href="#" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.25 18.4H19.55V9.2H12.65V18.4H14.95V11.5H17.25V18.4ZM1.15 18.4V1.15C1.15 0.845001 1.27116 0.552494 1.48683 0.336827C1.70249 0.12116 1.995 0 2.3 0H18.4C18.705 0 18.9975 0.12116 19.2132 0.336827C19.4288 0.552494 19.55 0.845001 19.55 1.15V6.9H21.85V18.4H23V20.7H0V18.4H1.15ZM5.75 9.2V11.5H8.05V9.2H5.75ZM5.75 13.8V16.1H8.05V13.8H5.75ZM5.75 4.6V6.9H8.05V4.6H5.75Z" fill="#001943"/>
                </svg>
                <span>{{ __('Hotel Lodge') }}</span>
            </a>
            <a href="{{route('open-cash.index')}}" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5714 0H1.42857C1.04969 0 0.686328 0.152182 0.418419 0.423068C0.15051 0.693954 0 1.06135 0 1.44444V24.5556C0 24.9386 0.15051 25.306 0.418419 25.5769C0.686328 25.8478 1.04969 26 1.42857 26H18.5714C18.9503 26 19.3137 25.8478 19.5816 25.5769C19.8495 25.306 20 24.9386 20 24.5556V1.44444C20 1.06135 19.8495 0.693954 19.5816 0.423068C19.3137 0.152182 18.9503 0 18.5714 0ZM14.2857 20.2222H5.71428V17.3333H14.2857V20.2222ZM14.2857 14.4444H5.71428V11.5556H14.2857V14.4444ZM14.2857 8.66667H5.71428V5.77778H14.2857V8.66667Z" fill="#001943"/>
                </svg>
                <span>{{ __('Cash Register') }}</span>
            </a>
            <a href="{{route('information.index')}}" class="flex flex-col bg-white shadow-lg rounded-xl overflow-hidden py-6 px-3">
                <svg class="mx-auto mb-1 w-8 h-8" viewBox="-5 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 0C5.8318 0 0 5.8318 0 13C0 20.1682 5.8318 26 13 26C20.1682 26 26 20.1682 26 13C26 5.8318 20.1682 0 13 0ZM14.3 20.8H11.7V18.2H14.3V20.8ZM15.5688 14.4495C15.314 14.6549 15.0683 14.8512 14.8733 15.0462C14.3429 15.5753 14.3013 16.0563 14.3 16.0771V16.25H11.7V16.0329C11.7 15.8795 11.7377 14.5028 13.0338 13.2067C13.2873 12.9532 13.6019 12.6958 13.9321 12.428C14.8863 11.6545 15.5129 11.0903 15.5129 10.3129C15.4978 9.65616 15.2263 9.03142 14.7564 8.57235C14.2865 8.11328 13.6556 7.85634 12.9987 7.85651C12.3418 7.85668 11.7111 8.11395 11.2414 8.57326C10.7718 9.03258 10.5006 9.65746 10.4858 10.3142H7.8858C7.8858 7.4945 10.1803 5.2 13 5.2C15.8197 5.2 18.1142 7.4945 18.1142 10.3142C18.1142 12.3903 16.5815 13.6292 15.5688 14.4495Z" fill="#001943"/>
                </svg>
                <span>{{ __('Support') }}</span>
            </a>
        </div>

    </div>

    <div class="">
        <x-label class="font-semibold mb-4 mt-2 left pl-8">Suggestion and Recommendation</x-label>
        <slider :items="{{ $recommendations }}"></slider>
    </div>

        <div class="grid grid-cols-2">
            <chart label="Revenue" :data="{{ $data_total_revenue }}" :bg-color="{{ $data_bgcolor_per_revenue }}" :labels="{{ $data_label_per_revenue }}">
                <div class="col-md-1 sm:col-md-1 mt-auto">
                    <canvas id="canvas" class="h-full w-full"></canvas>
                </div>
            </chart>
            <chart v-slot="{ changeHandler, filter, filterChangeHandler, filter_value, dateRangeHandler }" canvas-id="monthly_revenue" label="Per month revenue" :data="{{ $per_month_revenue }}" :fill="false" :labels="{{ $months }}" type="line" border-color="#001943" update-url="{{ route('update-line-graph') }}">
                <div class="col-md-1 sm:col-md-1">
                    <toggle v-slot="{ display, toggled }">
                        <div>
                            <select class="form-input w-2/5 mx-auto my-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" @change="filterChangeHandler($event.target.value)">
                                <option disabled selected>Select filter</option>
                                <option value="date_rage">Date Range</option>
                                <option value="yearly">Yearly</option>
                            </select>
                            <select class="form-input mx-auto my-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" @change="changeHandler($event.target.value)" v-if="filter == 'yearly'">
                                <option disabled selected>Select year</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <template  v-if="filter == 'date_rage'">
                                <div class="grid grid-cols-4 gap-3">
                                    <div class="col-md-1 sm:col-md-1">
                                        <x-label class="font-semibold">From</x-label>
                                        <input type="date" class="form-input mx-auto w-50 my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none" v-model="filter_value.from">
                                    </div>
                                    <div class="col-md-1 sm:col-md-1">
                                        <x-label class="font-semibold">To</x-label>
                                        <input type="date" class="form-input mx-auto w-50 my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none" v-model="filter_value.to">
                                    </div>
                                    <div class="col-md-1 sm:col-md-1 my-auto mx-auto">
                                        <button type="submit" class="mt-5 inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-darkblue focus:outline-none focus:border-red-300 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5 w-36" @click="dateRangeHandler">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </toggle>
                        
                    <canvas id="monthly_revenue" class="h-full w-full"></canvas>
                </div>
            </chart>
        </div>
</x-app-layout>
