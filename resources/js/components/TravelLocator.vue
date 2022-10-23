<template>
	<div class="bg-white lg:px-8 m-auto px-4 py-16 rounded-lg sm:px-6 sm:w-3/5 w-full z-10">
		<div class="grid grid-cols-2 items-center lg:grid-cols-8 md:grid-cols-5 sm:grid-cols-2">
			<!-- <div class="col-span-1">
				<input id="one_way" name="form-input" type="radio"  class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" value="one_way" v-model="data.trip_type"/>
		      	<label for="one_way">
		        	<span class="text-sm leading-5 font-medium text-gray-700">One Way</span>
		      	</label>
			</div>
			<div class="col-span-1">
				<input id="roundtrip" name="form-input" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" value="round_trip" v-model="data.trip_type" />
		      	<label for="roundtrip">
		        	<span class="text-sm leading-5 font-medium text-gray-700">Roundtrip</span>
		      	</label>
			</div> -->
			<div class="col-span-2">
				<label for="passenger">
		        	<span class="text-sm leading-5 font-medium text-gray-700">Passenger</span>
		      	</label>

		      	<span class="relative z-0 inline-flex shadow-sm ml-3">
		          	<button type="button" class="active:bg-gray-100 active:text-gray-700 bg-white border border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue focus:z-10 font-bold font-medium hover:text-gray-500 inline-flex items-center leading-5 px-4 py-2 relative rounded-l-md text-2xl text-gray-700 text-sm transition" @click="passengerCount('remove')">
		          	    -
		          	</button>
		          	
		          	<input type="text" class="-ml-px active:bg-gray-100 active:text-gray-700 bg-white border border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue focus:z-10 font-medium hover:text-gray-500 inline-flex items-center leading-5 px-4 py-2 relative text-center text-gray-700 text-sm transition w-16"  v-model="data.passenger_count" readonly>

		          	<button type="button" class="-ml-px active:bg-gray-100 active:text-gray-700 bg-white border border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue focus:z-10 font-bold font-medium hover:text-gray-500 inline-flex items-center leading-5 px-4 py-2 relative rounded-r-md text-2xl text-gray-700 text-sm transition" @click="passengerCount('add')">
		          	    +
		          	</button>
		      	</span>
			</div>
			<div class="col-span-full sm:col-span-2">
				<input id="pwd" name="form-input push_notifications" type="checkbox" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" v-model="data.is_pwd"/>
				<label for="pwd">
			  		<span class="text-sm leading-5 font-medium text-gray-700">Wheelchair Access?</span>
				</label>
			</div>
		</div>
		
		<div class="gap-2 grid grid-cols-1 show-selection-for-mobile sm:gap-10 sm:grid-cols-2 mt-4">
			<div class="col-span-1 sm:col-span-1">
				<v-select
					class="focus:z-10 leading-5 relative text-center text-gray-700 text-sm transition w-full selection-1 sm:remove-selection"
				    :options="cities"
				    label="city_with_state"
				    :reduce="item => item.id"
				    v-model="data.departure_id"
				    @input="selectedChanged"
				    placeholder="Departure"
				    >
				    
				</v-select>
			</div>
			<div class="col-span-1 sm:col-span-1">
				<v-select
					class="focus:z-10 leading-5 relative text-center text-gray-700 text-sm transition w-full selection-2 sm:remove-selection"
				    :reduce="item => item.id"
				    :options="cities"
				    label="city_with_state"
				    v-model="data.arrival_id"
				    @input="selectedChanged"
				    placeholder="Arrival"
				    >
				    
				</v-select>
			</div>

			<div class="col-span-full sm:col-span-full" v-if="data.departure_date">
				<label class="font-bold italic">{{ data.is_one_way ? 'One Way' : 'Round Trip'}}</label>
			</div>

			<div class="col-span-1 sm:col-span-2">
				<input ref="datepickerDepartureMobile" type="text" class="border-gray-400 w-full selection-3" v-model="data.departure_date" placeholder="Select Date" readonly>
			</div>

			<!-- <div class="col-span-1 sm:col-span-1">
				<input ref="datepickerReturnMobile" type="text" class="border-gray-400 w-full selection-3" :class="data.trip_type == 'one_way' ? 'bg-gray-300' : ''" v-model="data.return_date" :disabled="data.trip_type == 'one_way'" placeholder="Return Date" readonly>
			</div> -->

			<div class="col-span-full sm:col-span-full">
				<button type="submit" class="bg-red-500 border border-transparent duration-150 ease-in-out focus:border-red-300 focus:outline-none focus:shadow-outline-red font-medium h-full inline-flex items-center justify-center px-4 py-2 sm:leading-5 sm:text-sm text-white transition w-full" @click="search">
				    Search
				</button>
			</div>

		</div>

		<div class="grid grid-cols-5 show-selection-for-web mt-4">
			<div class="col-span-2 sm:col-span-1">
				<v-select
					class="focus:z-10 leading-5 relative text-center text-gray-700 text-sm transition w-full selection-1"
				    :options="cities"
				    label="city_with_state"
				    :reduce="item => item.id"
				    v-model="data.departure_id"
				    @input="selectedChanged"
				    placeholder="Departure"
				    >
				    
				</v-select>
			</div>
			<div class="col-span-2 sm:col-span-1">
				<v-select
					class="focus:z-10 leading-5 relative text-center text-gray-700 text-sm transition w-full selection-2"
				    :reduce="item => item.id"
				    :options="cities"
				    label="city_with_state"
				    v-model="data.arrival_id"
				    @input="selectedChanged"
				    placeholder="Arrival"
				    >
				    
				</v-select>
			</div>
			<div class="col-span-2 sm:col-span-2">
				<input ref="datepickerDeparture" type="text" class="border-gray-400 w-full selection-3" v-model="data.departure_date" placeholder="Select Date" readonly>
			</div>
			<!-- <div class="col-span-2 sm:col-span-1">
				<input ref="datepickerReturn" type="text" class="border-gray-400 w-full selection-3" :class="data.trip_type == 'one_way' ? 'bg-gray-300' : ''" v-model="data.return_date" id="secondRangeInput" placeholder="Return Date" readonly>
			</div> -->
			<div class="col-span-2 sm:col-span-1">
				<button type="submit" class="bg-red-500 border border-transparent btn__search duration-150 ease-in-out focus:border-red-300 focus:outline-none focus:shadow-outline-red font-medium h-full inline-flex items-center justify-center px-4 py-2 sm:leading-5 sm:text-sm text-white transition w-full" @click="search">
				    Search
				</button>
			</div>
		</div>

		<div class="grid grid-cols-2 mt-4 show-selection-for-web">
			<div class="col-span-1 ml-2 sm:col-span-1" v-if="data.departure_date">
				<label class="font-bold italic">{{ data.is_one_way ? 'One Way' : 'Round Trip'}}</label>
			</div>
		</div>

		<modal
			:bodyMessage="modalMessage"
			:headerTitle="modalTitle"
			:show="showModal"
			@closeModal="showModal = false"
		></modal>

	 </div>
</template>
<script type="text/javascript">
	import Vselect from "vue-select";
	import "vue-select/dist/vue-select.css";
	import flatpickr from 'flatpickr';
	import 'flatpickr/dist/flatpickr.css';
	import Modal from './Modal.vue';

	export default {
		name: 'TravelLocator',

		props: {
			getCitiesUrl: String,
			findAvailableTripUrl: String,
			sendPayloadUrl: String,
			hasUserLoggedIn: Number,
		},

		data() {
			return {
				cities: [],

				data: {
					passenger_count: 1,
					trip_type: 'one_way',
					is_pwd: false,
					departure_id: null,
					arrival_id: null,
					display_date: null,
					departure_date: null,
					return_date: null,

					is_one_way: false
				},
				trips: [],
				price: [],
				available_dates: [],
				buses: [],
				my_location: {
					latitude: '36.2240713',
					longitude: '-119.3382614',
				},

				modalMessage: null,
				modalTitle: null,
				showModal: false

			}
		},

		components: {
		    'v-select' : Vselect,
		    Modal,
		},

		mounted() {

			this.getCurrentLocation();
			this.setupFlatpickr();
			this.init();

		},


		render() {
		    return this.$scopedSlots.default({
		    	//
		    });
		},

		watch: {
			'data.is_pwd'(val) {
				if(val) {
					this.modalMessage = "Hello, Thank you for letting us know you need wheelchair access please contact (323) 587-5233 to schedule your trip we would be happy to assist"
					this.modalTitle = "Wheelchair access";
					this.showModal = true;
				}
			},

			'data.departure_date'(val) {
				let date_list = val.split(",");
				if(date_list.length > 1) {
					this.data.is_one_way = false
				} else {
					this.setupFlatpickr();
					this.data.is_one_way = true;
				}


			}

		},


		methods: {

			init() {
				let my_location = this.my_location;
				axios.get(this.getCitiesUrl, { params: my_location } )
					.then(response => {
						this.cities = response.data.cities;
						this.data.departure_id = response.data.default_departure.id
						this.data.arrival_id = response.data.default_arrival.id
					}).catch(errors => {

					})
			},

			setupFlatpickr() {
				let $this = this;
				setTimeout(() => {
					flatpickr(this.$refs.datepickerDeparture, {
						minDate: "today",
						mode: "multiple",
						enable: $this.available_dates,
						onChange: function(selectedDates, dateStr, instance) {
						    var selectedDatesStr = selectedDates.reduce(function(acc, ele) {
					            var str = instance.formatDate(ele, "Y-m-d");
					            acc = (acc == '') ? str : acc + ';' + str;
					            return acc;
					        }, '');

					        var _selectedDates = selectedDatesStr.split(';');

							instance.set('enable', [function(date) {
					            if (selectedDates.length == 2 || _selectedDates.length == 2) {
					                var currDateStr = instance.formatDate(date, "Y-m-d")
					                var x = selectedDatesStr.indexOf(currDateStr);
					                if(x != -1) {
					                	// console.log('x != -1', x != -1)
					                	return $this.available_dates;
					                } else {
					                	return x != -1;
					                }
					                
					            } else {
				                	return $this.available_dates;
					            }
					        }])
						},

						onOpen: function(selectedDates, dateStr, instance) {
							var selectedDatesStr = selectedDates.reduce(function(acc, ele) {
					            var str = instance.formatDate(ele, "Y-m-d");
					            acc = (acc == '') ? str : acc + ';' + str;
					            return acc;
					        }, '');

					        var _selectedDates = selectedDatesStr.split(';');

							instance.set('isEnabled', [function(date) {
					            if (selectedDates.length == 2 || _selectedDates.length == 2) {
					                var currDateStr = instance.formatDate(date, "Y-m-d")
					                var x = selectedDatesStr.indexOf(currDateStr);
					                if(x != -1) {
					                	return $this.available_dates;
					                } else {
					                	return x != -1;
					                }
					                
					            } else {
				                	return $this.available_dates;
					            }
					        }])						
						},
					});
		
					flatpickr(this.$refs.datepickerDepartureMobile, {
						minDate: "today",
						mode: "multiple",
						enable: $this.available_dates,
						onChange: function(selectedDates, dateStr, instance) {
						    var selectedDatesStr = selectedDates.reduce(function(acc, ele) {
					            var str = instance.formatDate(ele, "Y-m-d");
					            acc = (acc == '') ? str : acc + ';' + str;
					            return acc;
					        }, '');

					        var _selectedDates = selectedDatesStr.split(';');

							instance.set('enable', [function(date) {
					            if (selectedDates.length == 2 || _selectedDates.length == 2) {
					                var currDateStr = instance.formatDate(date, "Y-m-d")
					                var x = selectedDatesStr.indexOf(currDateStr);
					                if(x != -1) {
					                	// console.log('x != -1', x != -1)
					                	return $this.available_dates;
					                } else {
					                	return x != -1;
					                }
					                
					            } else {
				                	return $this.available_dates;
					            }
					        }])
						},

						onOpen: function(selectedDates, dateStr, instance) {
							var selectedDatesStr = selectedDates.reduce(function(acc, ele) {
					            var str = instance.formatDate(ele, "Y-m-d");
					            acc = (acc == '') ? str : acc + ';' + str;
					            return acc;
					        }, '');

					        var _selectedDates = selectedDatesStr.split(';');

							instance.set('isEnabled', [function(date) {
					            if (selectedDates.length == 2 || _selectedDates.length == 2) {
					                var currDateStr = instance.formatDate(date, "Y-m-d")
					                var x = selectedDatesStr.indexOf(currDateStr);
					                if(x != -1) {
					                	return $this.available_dates;
					                } else {
					                	return x != -1;
					                }
					                
					            } else {
				                	return $this.available_dates;
					            }
					        }])						
						},
					});
				}, 1000)
			},

			getCurrentLocation() {
				if (navigator.geolocation) {
				     navigator.geolocation.getCurrentPosition(this.showPosition);
			  	} else { 
			    	console.log("Geolocation is not supported by this browser.");
			  	}

			},

			showPosition(position) {
				console.log(position);
			  	// this.my_location.latitude = position.coords.latitude;
			  	// this.my_location.longitude = position.coords.longitude;
			},

			passengerCount(type) {

				switch(type) {
					case 'add':
						this.data.passenger_count++;
						break;
					case 'remove':
						if(this.data.passenger_count <= 1) {
							return;
						}

						this.data.passenger_count--;
						break;
				}
			},


			selectedChanged() {
				axios.post(this.findAvailableTripUrl, this.data)
					.then(response => {
						
						this.trips = response.data.trips;
						this.price = response.data.price;
						this.available_dates = response.data.available_dates;
						this.buses = response.data.buses;

						setTimeout(() => {
							this.setupFlatpickr();
						}, 1000)

						
					}).catch(errors => {
						
					})
			},

			search() {
				axios.post(this.sendPayloadUrl, this.data)
					.then(response => {
						if(this.hasUserLoggedIn) {
							window.location.href = response.data.route;
						} else {
							window.location.href = '/travel/login';

						}
					}).catch(error => {

					})
			}
		}

	}
</script>

<style>
	
	.selection-1 .vs__dropdown-toggle {
		border-radius: 8px 0px 0px 8px !important;
		height: 45px;
	}

	.selection-2 .vs__dropdown-toggle {
		border-radius: 0 !important;
		height: 45px;
	}

	.selection-3 {
		height: 45px;
	}

	.btn__search {
		border-radius: 0px 8px 8px 0px;
	}

	@media screen and (min-width: 640px) {
		.selection-2 .vs__dropdown-toggle {
			border-radius: 8px;
		}

		.selection-1 .vs__dropdown-toggle {
			border-radius: 8px;
		}
	}

	@media screen and (min-width: 1024px) {
		.show-selection-for-mobile {
			display: none !important;
		}

		.show-selection-for-web {
			display: block grid;
		}
	}

	@media screen and (max-width: 1024px) {
		.show-selection-for-web {
			display: none;
		}
	}

	@media screen and (max-width: 1025px) {
		.show-selection-for-mobile {
			display: block grid;
		}

		.selection-2 .vs__dropdown-toggle {
			border-radius: 8px !important;
		}

		.selection-1 .vs__dropdown-toggle {
			border-radius: 8px !important;
		}
	}


</style>