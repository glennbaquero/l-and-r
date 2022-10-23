<template>
	<div class="flex flex-col">
		<div class="-my-2 lg:-mx-8 lg:px-8 overflow-x-auto py-2 sm:px-6">
			<div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
			    <table class="min-w-full text-xs">
			        <thead>
			            <tr class="text-center">
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                        Ticket ID
		                    </th>
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                        Passenger
		                    </th>
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                        Passenger Count
		                    </th>
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                        Departure - Arrival
		                    </th>
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                    	Travel Date
		                    </th>
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                    	Amount Paid
		                    </th>
		                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 leading-4 text-gray-500 uppercase tracking-wider font-bold">
		                    </th>
			            </tr>
			        </thead>
			        <tbody class="bg-white">
			            
			            <tr class="hover:bg-gray-100 cursor-pointer h-16" v-for="ticket in data">
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		{{ ticket.ticket_number }}
			            	</td>
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		{{ ticket.passenger }}
			            	</td>
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		{{ ticket.passenger_count }}
			            	</td>
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		{{ ticket.departure }} - {{ ticket.arrival }}
			            	</td>
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		{{ ticket.travel_date }}
			            	</td>
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		{{ ticket.amount_paid }}
			            	</td>
			            	<td class="text-center border-b-2 border-gray-300 px-3">
			            		<a href="#" @click="showInfo(ticket)" class="focus:outline-none focus:shadow-outline inline-flex">
			            		    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
			            		</a>
			            	</td>
			            </tr>
	                    <!--Pagination-->
	                    <tr>
	                        <td colspan="2" class="px-6 py-2 whitespace-no-wrap text-left border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
	                            Showing {{ meta.from }} to {{ meta.to }} of {{ meta.total }}
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
			            
			        </tbody>
			    </table>
			</div>
		</div>

	    <div v-if="display" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex text-black">
	        <div class="h-4/5 lg:w-screen md:w-screen mx-auto my-6 relative sm:w-screen w-screen xl:w-1/2">
	            <!--content-->

	            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
	                <!--header-->
	                
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <h3 class="text-3xl font-semibold">
                           Ticket Information
                        </h3>
                        <a href="#" @click="closeModal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    </div>

	                <!--body-->
	                <div class="relative p-6 flex-auto" >
	                	<iframe :src="ticket_info.webPrintUrl" class="h-96 w-full" id="pdf_viewer"></iframe>
	                </div>

	                <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                        <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-darkblue focus:outline-none focus:border-red-300 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5 w-36" @click="rebook">
                            Rebook
                        </button>
                    </div>

	            </div>
	        </div>
	    </div>
	    <div v-if="display" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
	</div>
</template>

<script type="text/javascript">
	import DataTable from './DataTable.vue';
	export default {
		name: 'UserReservationList',
		
		props: {
			ticketFetchUrl: String,
			sendPayloadUrl: String
		},

		data() {
			return {
				loading: false,
				params: {},
				page: 1,
				data: [],
				links: {},
				meta: {},
				display: false,
				ticket_info: {}
			}
		},

		components: {
			DataTable
		},

		mounted() {
			this.fetch();
		},

		methods: {
			setParam: _.debounce(function(key, value) {
			    this.params[key] = value;
			    this.page = 1;
			    this.createUrl();
			}, 1000),

			mapParams() {
			    this.createUrl();
			},

	        createUrl() {
	            this.ticketFetchUrl = this.ticketFetchUrl + '?' + 'page='+ this.page;

	            _.forEach(this.params, (value, index) => {
	                this.ticketFetchUrl += '&' + index + '=' + value;
	            });

	            this.fetch();
	        },

	        fetch() {
	            this.loading = true;
	            axios.get(this.ticketFetchUrl)
	                .then(response => {
	                    this.data = response.data.data;
	                    this.links = response.data.links;
	                    this.meta = response.data.meta;
	                    this.loading = false;
	                })
	                .catch(error => {
	                    console.log(error.response.data);
	                    this.loading = false;
	                })
	        },

	        prev() {
	            this.page--;

	            this.createUrl();
	        },

	        next() {
	            this.page++;

	            this.createUrl();
	        },

	        showInfo(ticket) {
	        	this.display = true;
	        	this.ticket_info = ticket
	        },

			closeModal() {
				this.display = false
			},

	        rebook() {
	        	let passenger_info = {
	        		first_name: this.ticket_info.passenger_info.first_name,
	        		last_name: this.ticket_info.passenger_info.last_name,
	        		gender: this.ticket_info.passenger_info.gender,
	        		email: this.ticket_info.passenger_info.email,
	        		no_of_bags: this.ticket_info.passenger_info.no_of_bags,
	        		cellphone_number: this.ticket_info.passenger_info.cellphone_number,
	        		with_infant: this.ticket_info.passenger_info.with_infant,
	        		infant_firstname: this.ticket_info.passenger_info.infant_firstname,
	        		infant_lastname: this.ticket_info.passenger_info.infant_lastname,
	        		infant_gender: this.ticket_info.passenger_info.infant_gender,
	        		ticket_type: this.ticket_info.type_of_ticket,
	        		payment: {
	        			cardholder_firstname: null,
	        			cardholder_lastname: null,
	        			card_number: null,
	        			cvv: null,
	        			expiry_month: 'none',
	        			expiry_year: 'none',
	        		},
	        	};

	        	let seat_selected_list = [
	        		{
	        			id: 0, 
	        			total_baggage: 0,
	        			passenger: passenger_info
	        		}
	        	];

	        	let payloads = {
	        		arrival_id: this.ticket_info.arrival_id,
	        		departure_id: this.ticket_info.departure_id,
	        		passenger_count: this.ticket_info.passenger_count,
	        		passenger_info: passenger_info,
	        		trip_id: this.ticket_info.trip.id,
	        		trip: this.ticket_info.trip,

	        		seat_selected_list: seat_selected_list
	        	}

				axios.post(this.sendPayloadUrl, payloads)
					.then(response => {
						window.location.href = response.data.route;
					}).catch(error => {

					})
	        }

		}
	}
</script>