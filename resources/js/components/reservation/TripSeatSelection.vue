<template>
	<div>
		<div class="lg:px-8 px-4 relative sm:px-6 w-full">

		  	<travel-locator
		  		get-cities-url="get-cities"
		  		find-available-trip-url="ticket/find/trip"
		  	></travel-locator>

		  	<div class="gap-1 grid grid-cols-7 lg:h-48 mx-auto w-5/6 xl:gap-0 xl:h-1/3 swiper-container">
		  		<div class="col-span-full text-center mb-5"  v-if="payloads.departure_city">
		  			<label class="font-bold text-4xl">TRIP SEARCH</label>
		  		</div>
		  		<div class="swiper-wrapper">
		  			<div class="col-span-1 xl:h-40 xl:my-auto swiper-slide" v-for="(display_date, key) in available_dates">
		  				<button :class="payloads.selected_date == display_date ? 'bg-darkblue border duration-150 ease-in-out focus:border-red-300 focus:outline-none focus:shadow-outline-red font-bold font-medium h-full inline-flex items-center justify-center px-4 py-2  sm:leading-5 text-white text-xs transition w-full xl:text-lg' : 'text-sm bg-white border border-transparent duration-150 ease-in-out focus:border-red-300 focus:outline-none focus:shadow-outline-red font-bold font-medium h-full hover:bg-gray-200 hover:text-black inline-flex items-center justify-center px-4 py-2  sm:leading-5 sm:text-sm text-black transition w-full border-black' " @click="selectedDate(display_date)">
		  					{{ parseDate(display_date) }} <br>
		  					FROM<br>
		  					$ {{ price.adult_one_way }}
		  				</button>
		  			</div>
		  		</div>
		  	</div>
		</div>

		<div class="lg:px-8 lg:py-24 px-4 py-16 relative sm:px-6 w-full" v-if="payloads.selected_date">

			<div class="lg:w-8/12 md:w-auto mx-auto my-auto sm:w-full xl:w-6/12">
				<div class="bg-gray-200 lg:flex md:flex rounded-3xl sm:flex-wrap xl:flex">
					<div class="bg-darkblue flex-none font-semibold lg:w-2/12 md:w-2/12 p-3 rounded-3xl sm:w-full text-center text-white xl:w-2/12">
						<label>ORIGIN</label>
					</div>
					<div class="flex-initial font-semibold p-3 w-auto">
						{{ payloads.departure_city.name }}, {{ payloads.departure_city.state }} - {{ parseDate(payloads.selected_date) }}
					</div>
					<div class="flex-initial font-semibold hidden lg:block md:block p-3 sm:hidden w-auto">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
					</div>
					<div class="flex-initial font-semibold p-3 w-auto">
						{{ payloads.arrival_city.name }}, {{ payloads.arrival_city.state }}
					</div>
				</div>
			</div>
		</div>

		<!-- Desktop View -->

		<div class="lg:px-8 lg:py-24 px-4 py-16 relative sm:px-6 w-full xl:block lg:block md:hidden sm:hidden hidden"  v-if="available_time.length">
			<div class="border-b-2 grid grid-cols-2 mb-2 mx-auto w-5/6">
				<div class="col-start-2">
					<div class="bg-gray-200 grid grid-cols-2 rounded-t-2xl">
						<div class="col-span-1 mx-auto">
							<label>WEB FARE</label>
						</div>
						<div class="col-span-1 mx-auto">
							<label>STANDARD</label>
						</div>
					</div>
				</div>
			</div>

			<!-- {{-- Loop here --}} -->
			<div class="border-b-2 grid grid-cols-2 mx-auto p-2 w-5/6" v-for="(trip_time, index) in available_time">
				<div class="col-span-full">
					<div class="bg-gray-100 gap-5 grid grid-cols-4 p-9 rounded-full">
						<div class="border-dashed border-r-2 col-span-1 my-auto">
							<div class="grid grid-cols-3"> 
								<div class="col-span-1">
									<label class="font-bold text-md">
										{{ trip_time.formatted_time }}
									</label>
									<p class="text-xs">
										{{ payloads.departure_city.name }}
									</p>
								</div>
								<div class="col-span-1 mx-auto my-auto">
									<svg class="h-10 w-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
								</div>
								<div class="col-span-1">
									<label class="font-bold text-md">
										{{ trip_time.formatted_arrival_time }}
									</label>
									<p class="text-xs">
										{{ payloads.arrival_city.name }}, {{ payloads.arrival_city.state }}
									</p>
								</div>
							</div>
						</div>
						<div class="col-span-1 my-auto">
							<label class="text-xs">
								Duration
							</label>
							<p class="flex font-bold text-lg">
								<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
								02h 50m
							</p>
						</div>		
						<div class="col-span-1 mx-auto">
							<button class="bg-gray-200 border-4 border-solid font-bold h-20 hover:bg-darkblue hover:text-white rounded-full w-20" :class="selectedTripTimeIndex == index+'-web_fare' ? 'bg-darkblue text-white' : ''"  @click="renderBus(trip_time, index, 'web_fare')">
								<span class="">$</span><span class="">{{ price.adult_one_way }}</span>
							</button>
						</div>
						<div class="col-span-1 mx-auto">
							<button class="bg-gray-200 border-4 border-solid font-bold h-20 hover:bg-darkblue hover:text-white rounded-full w-20" :class="selectedTripTimeIndex == index+'-standard' ? 'bg-darkblue text-white' : ''"  @click="renderBus(trip_time, index, 'standard')">
								<span class="">$</span><span class="">{{ price.adult_one_way }}</span>
							</button>
						</div>				
					</div>
					<div class="grid grid-cols-10 mt-5">
						<div class="col-span-1 mx-auto">
							<button class="bg-gray-100 btn font-semibold p-2 rounded-full text-sm flex" @click="openRouteDetail">
								<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"></path></svg>Route Detail
							</button>
						</div>
						<div class="col-span-1 flex mx-auto">
							<button>
								<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M17.778 8.222c-4.296-4.296-11.26-4.296-15.556 0A1 1 0 01.808 6.808c5.076-5.077 13.308-5.077 18.384 0a1 1 0 01-1.414 1.414zM14.95 11.05a7 7 0 00-9.9 0 1 1 0 01-1.414-1.414 9 9 0 0112.728 0 1 1 0 01-1.414 1.414zM12.12 13.88a3 3 0 00-4.242 0 1 1 0 01-1.415-1.415 5 5 0 017.072 0 1 1 0 01-1.415 1.415zM9 16a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
							</button>
							<button>
								<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
							</button>

							<button>
								<img src="data:image/png;base64,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" class="h-6 w-6">
							</button>
						</div>
						<div class="col-span-1 my-auto flex">
							<div class="bg-black flex h-7 items-center rounded-full w-7">
								<img src="data:image/png;base64,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" class="h-5 mx-auto w-5">
							</div>
							<label class="font-semibold my-auto text-sm"> &nbsp; {{ trip_time.available_seat }} Available</label>
							
						</div>
						<div class="col-span-1 my-auto">
							<label class="font-semibold my-auto text-sm">{{ trip_time.trip.route_name }}</label>
						</div>
					</div>
				</div>
				<!-- <div class="col-span-1">
					<div class="gap-5 grid grid-cols-2">
						<div class="col-span-1 mx-auto">
							<button class="bg-gray-200 border-8 border-solid font-bold h-52 hover:bg-darkblue hover:text-white rounded-full w-52" :class="selectedTripTimeIndex == index+'-web_fare' ? 'bg-darkblue text-white' : ''"  @click="renderBus(trip_time, index, 'web_fare')">
								<span class="text-2xl">$</span><span class="text-4xl">{{ price.adult_one_way }}</span>
							</button>
						</div>
						<div class="col-span-1 mx-auto">
							<button class="bg-gray-200 border-8 border-solid font-bold h-52 hover:bg-darkblue hover:text-white rounded-full w-52" :class="selectedTripTimeIndex == index+'-standard' ? 'bg-darkblue text-white' : ''"  @click="renderBus(trip_time, index, 'standard')">
								<span class="text-2xl">$</span><span class="text-4xl">{{ price.adult_one_way }}</span>
							</button>
						</div>
					</div>
				</div> -->

				<div class="col-span-full p-7" v-if="bus_model.length">
					<div class="mx-auto w-90-percent">
						<div class="gap-4 grid grid-cols-3">
							<div class="border col-span-2 px-4 py-4 rounded-md shadow-md w-auto">
								<table class="w-full">
									<tr class="h-10" v-for="row in bus_model">
									    <td v-for="column in row" class=" bg-center bg-contain bg-no-repeat h-5 w-5 text-center" :style="{ backgroundImage: 'url(' + column.image_path + ')', transform: 'rotate('+column.orientation+'deg)', cursor: column.label != '' ? 'pointer' : '' }" @click="selectedSeatHandler(column)">
									    	<label class="bg-transparent border-transparent focus:border-blue-300 font-black px-0 py-0 rounded shadow-sm text-black text-center transition w-5 text-xs">{{ column.label }}</label>
									    </td>
									</tr>
								</table>
							</div>
							<div class="col-span-1 my-auto">
						        <div class="grid grid-cols-10 gap-4">
					                <div class="bg-gray-300 col-span-1 h-3 mx-auto my-auto rounded-xl w-3"></div>
					                <label> Available</label>
						        </div>
						        <div class="grid grid-cols-10 gap-4">
					                <div class="bg-red-400 col-span-1 h-3 mx-auto my-auto rounded-xl w-3"></div>
					                <label> Sold</label>
						        </div>
						        <div class="grid grid-cols-10 gap-4">
					                <div class="bg-lightblue col-span-1 h-3 mx-auto my-auto rounded-xl w-3"></div>
					                <label> Selected</label>
						        </div>
							</div>
							<div class="col-span-full mx-auto my-auto">
								<button class="bg-darkblue font-semibold p-2.5 rounded-full text-sm text-white" @click="registerPassenger" :disabled="disabledNextButton">REGISTER PASSENGER</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile -->
		<div class="lg:px-8 lg:py-24 px-4 py-16 relative sm:px-6 w-full xl:hidden lg:hidden md:block sm:block" v-if="available_time.length">
			<!-- {{-- Loop here --}} -->
			<div class="bg-gray-100 grid grid-cols-1 mt-2 rounded-md w-full" v-for="(trip_time, index) in available_time">
				<div class="col-span-1 font-semibold text-2xl mx-auto flex">
					<label>{{ trip_time.formatted_time }}</label> 
					<svg class="w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> 
					<label>{{ trip_time.formatted_arrival_time }} </label>
				</div>
				<div class="col-span-1 mx-auto">
					<button class="bg-gray-200 btn flex font-semibold p-2 rounded-full text-xs"  @click="openRouteDetail">
						<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"></path></svg>Route Detail
					</button>
				</div>
				<div class="col-span-1 mx-auto mt-3">
					<div class="gap-2 grid grid-cols-2 h-32 w-80">
						<div class="bg-white col-span-1 flex font-semibold h-full items-center my-auto rounded-lg text-black text-center" :class="selectedTripTimeIndex == index+'-web_fare' ? 'bg-darkblue text-white' : ''"  @click="renderBus(trip_time, index, 'web_fare')">
							<div class="mx-auto">
								<p class="text-sm">Web Fare</p>
								<p class="text-xl"><span class="text-xs">$</span>{{ price.adult_one_way }}</p>
							</div>
						</div>
						<div class="bg-white col-span-1 flex font-semibold h-full items-center my-auto rounded-lg text-black text-center" :class="selectedTripTimeIndex == index+'-standard' ? 'bg-darkblue text-white' : ''"  @click="renderBus(trip_time, index, 'standard')">
							<div class="mx-auto">
								<p class="text-sm">Standard</p>
								<p class="text-xl"><span class="text-xs">$</span>{{ price.adult_one_way }}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-span-1 flex mt-3 mx-auto">
					<p class="flex font-bold text-lg">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
						02h 50m
					</p> &nbsp; 
					<div class="bg-black flex h-7 items-center rounded-full w-7">
						<img src="data:image/png;base64,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" class="h-5 mx-auto w-5">
					</div>
					<label class="font-semibold my-auto text-sm"> &nbsp; {{ trip_time.available_seat }} Available</label> &nbsp; 
					<label class="font-semibold my-auto text-sm">{{ trip_time.trip.route_name }}</label>
				</div>


				<div class="col-span-full mb-10 mt-5" v-if="bus_model.length">
					<div class="mx-auto w-90-percent">
						<div class="gap-4 grid grid-cols-3">
							<div class="border col-span-full px-4 py-4 rounded-md shadow-md w-auto">
								<table class="w-full h-44">
									<tr class="h-10" v-for="row in bus_model">
									    <td v-for="column in row" class=" bg-center bg-no-repeat h-10 text-center w-10" :style="{ backgroundImage: 'url(' + column.image_path + ')', transform: 'rotate('+column.orientation+'deg)', cursor: column.label != '' ? 'pointer' : '' }" @click="selectedSeatHandler(column)">
									    	<label class="bg-transparent border-transparent focus:border-blue-300 font-black px-0 py-0 rounded shadow-sm text-black text-center transition w-5 text-xs">{{ column.label }}</label>
									    </td>
									</tr>
								</table>
							</div>
							
							<div class="col-span-full mx-auto my-auto">
								<button class="bg-darkblue font-semibold p-2.5 rounded-full text-sm text-white" @click="registerPassenger">REGISTER PASSENGER</button>
							</div>
						</div>
					</div>
				</div>


			</div>

		</div>

		<confirmation-modal
			:bodyMessage="confirmationModalMessage"
			:headerTitle="confirmationModalTitle"
			:show="showConfirmationModal"
			@closeModal="showConfirmationModal = false"
			:has-footer="true"
		>
			<template v-slot:footerButton>
				<div class="gap-2 grid grid-cols-2 pl-4">
					<div class="col-span-1 sm:col-span-1">
						<button tabindex="3" type="button" class="w-full flex justify-center py-2 px-4 border border-lighterblue text-sm font-medium rounded text-black bg-transparent hover:bg-lighterblue hover:text-white focus:outline-none focus:border-transparent focus:shadow-outline-transparent active:bg-transparent focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out sm:leading-8" @click="showConfirmationModal = false">
						    No
						</button>
					</div>
					<div class="col-span-1 sm:col-span-1">
						<button tabindex="3" type="button" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-white bg-lightblue hover:bg-lighterblue focus:outline-none focus:border-lighterblue focus:shadow-outline-lighterblue active:bg-lighterblue focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out sm:leading-8" @click="processSeat">
						    Yes
						</button>
					</div>
				</div>
			</template>
			
		</confirmation-modal>


	    <div v-show="display" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex text-black">
	        <div class="h-4/5 lg:w-screen md:w-screen mx-auto my-6 relative sm:w-screen w-screen xl:w-1/2">
	            <!--content-->

	            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
	                <!--header-->
	                
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <h3 class="text-3xl font-semibold">
                           Route Detail
                        </h3>
                        <a href="#" @click="display = false">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    </div>

	                <!--body-->
	                <div class="relative p-6 flex-auto" >
	                	<div style="width: 100%; height: 50vh" class="mt-6">
		                	<google-map-direction :origin="payloads.departure_city" :destination="payloads.arrival_city" :waypoints="waypoints"></google-map-direction>
	                	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div v-show="display" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
	</div>
	
</template>
<script type="text/javascript">
	import TravelLocator from '../reservation/TravelLocator.vue';
	import ConfirmationModal from '../Modal.vue';
	import GoogleMapDirection from '../GoogleMapDirection.vue';
	import Swiper from 'swiper';
	import 'swiper/swiper-bundle.css';

	export default {
		name: 'TripSeatSelection',

		data() {
			return {
				available_dates: [],
				date_to_display: [],
				dropped_date: [],
				trips: [],
				available_time: [],
				price: 0,
				payloads: {
					selected_date: '',
					departure_city: {
						longitude: '-120.5058987',
						latitude: '46.6020711',
					},
					arrival_city: {
						longitude: '-120.5058987',
						latitude: '46.6020711',
					},
					number_of_ticket: 1,
				},

				bus: [],
				bus_model: [],
				original_model: [],
				old_selected_seat: {},
				seat_selected: {},
				seat_selected_list: [],
				confirmationModalMessage: '',
				confirmationModalTitle: '',
				showConfirmationModal: false,
				selectedTripTimeIndex: null,
				display: false,
				waypoints: []
			}

		},

		components: {
			TravelLocator,
			ConfirmationModal,
			GoogleMapDirection,
		},

		computed: {
			availableTrips() {
				var trips = [];

				_.each(this.trips, (trip) => {
					_.each(trip.trips, (availableTrips) => {
						trips.push(availableTrips);
					})
				})

				return trips;
			},

			disabledNextButton() {

				if(!_.isEmpty(this.seat_selected)) return false;

				return true;
			}
		},


		mounted() {

			if(!_.isEmpty(this.$parent.savedPayload)) {
				this.payloads = this.$parent.savedPayload;
			}


			var options = {};

		    options = {
		       	  	// Optional parameters
		       	  // 	direction: 'horizontal',
		       	  // 	loop: false,
		       	  // 	slidesPerView: 7,
		          //  	spaceBetween: 2,

		       	  // 	autoplay: {
		       	  //  		delay: 1000,
		       	 	// },
		    }
			  
			new Swiper('.swiper-container', options);
		},

		methods: {
			registerPassenger() {
				this.$parent.trip_seat_selection_data.payloads = this.payloads;
				this.$parent.trip_seat_selection_data.seat_selected = this.seat_selected;
				this.$parent.trip_seat_selection_data.bus_model = this.bus_model;
				this.$parent.trip_seat_selection_data.price = this.price;
				this.$parent.selected_seat_list = this.seat_selected_list;



				if(!_.isEmpty(this.$parent.savedPayload.seat_selected_list)) {

					_.each(this.$parent.savedPayload.seat_selected_list, (seat, key) => {

						this.seat_selected_list[key].passenger = seat.passenger;
					}) 
				}


				this.$parent.nextStep(3);
			},

			// renderDate(drop = 0) {
			// 	if(drop >= 1) {
			// 		this.available_dates = _.drop(this.available_dates, 7);

			// 	}

			// 	this.date_to_display = _.take(this.available_dates, 7);
			// },

			parseDate(date) {
				return moment(date).format('ddd DD MMM')
			},

			selectedDate(date) {
				this.$parent.loading = true;
				this.payloads.selected_date = date;
				let tripHasSameDate = [];

				_.each(this.availableTrips, (trip) => {
					if(trip.date == date) {
						this.payloads.trip = trip;
						this.payloads.trip_id = trip.id;
						tripHasSameDate.push(trip.id);
					}
				})

				let payloads = {
					trip_ids: tripHasSameDate,
					public_reservation: true,
					arrival_id: this.payloads.arrival_id,
					departure_id: this.payloads.departure_id,
				}

				axios.post(this.$parent.tripTimeUrl, payloads)
					.then(response => {
						this.available_time = response.data.time;
						this.bus = [];
						this.bus_model = [];
						this.original_model = [];
						this.old_selected_seat = [];
						this.seat_selected = [];
						this.$parent.loading = false;
					}).catch(error => {
						this.$parent.loading = false;
					})
			},

			renderBus(time, index, type) {
				this.selectedTripTimeIndex = index+'-'+type;
				this.$parent.loading = true;
				this.payloads.time = time;
				
				let payloads = {
					arrival_id:this.payloads.arrival_city.id,
					bus_id: time.bus_id,
					departure_id: this.payloads.departure_city.id,
					time_id: time.id,
					trip_id: this.payloads.trip_id,
					trip: this.payloads.trip,

				}
				
				axios.post(this.$parent.getBusUrl, payloads)
					.then(response => {
						this.bus_model = response.data.bus_model;
						this.original_model = response.data.bus_model;
						this.$parent.loading = false;
					}).catch(error => {
						this.$parent.loading = false;
					})
			},

			selectedSeatHandler(item) {
				this.pickSeat(item);
			},

			pickSeat(item) {

				if(this.payloads.passenger_count > this.seat_selected_list.length) {

					this.seat_selected = item;

					if(item.label != '' && !item.is_reserved) {
						_.each(this.bus_model, (row) => {
							_.each(row, (column) => {
								if(!_.isEmpty(this.old_selected_seat) && this.old_selected_seat.id === column.id) {
									column.image_path = this.old_selected_seat.image_path;
								}
							})
						})


						if(!item.image_path.includes('/icons/handicap.png')) {
							this.old_selected_seat.id = item.id;
							this.old_selected_seat.image_path = item.image_path;

							this.selected_seat = item;
							item.image_path = '/icons/selected_seat.png';
						} else {
							this.showConfirmationModal = true;
							this.confirmationModalMessage = 'Are you sure you want to select a handicap seat?';
							this.confirmationModalTitle = 'Confirmation';
						}

						this.seat_selected.total_baggage = 0;

						this.seat_selected.passenger = {
							with_infant: false,
							infant_gender: 'none',
							infant_firstname: '',
							infant_lastname: '',
							gender: 'none',
							ticket_type: 'none',
							cellphone_number: null,
							no_of_bags: null,
							total_baggage: 0,
						};

						this.seat_selected_list.push(this.seat_selected);

						// item.image_path = 'icons/seat_selected.png';
					}
				}
				
			},

			processSeat() {
				this.showConfirmationModal = false;

				this.old_selected_seat.id = this.seat_selected.id;
				this.old_selected_seat.image_path = this.seat_selected.image_path;

				this.selected_seat = this.seat_selected;
				this.seat_selected.image_path = '/icons/selected_seat.png';

			},

			openRouteDetail() {
				this.display = true;
			}
		}
	}
</script>
