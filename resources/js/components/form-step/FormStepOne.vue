<template>
	<div class="grid grid-cols-3 gap-1">
		<div class="col-span-1 sm:col-span-1">
		    <label for="departure" class="font-semibold">Departure</label>
		    <v-select
		    	v-if="showDepartureSelection"
		    	class="my-3"
		        v-model="item.departure_id" 
		        :options="cities"
		        label="name"
		        :reduce="item => item.id"
			    @input="selectedChanged('departure')"
		        >
		    </v-select>
		</div>
		<div class="col-span-1 sm:col-span-1">
		    <label for="departure" class="font-semibold">Arrival</label>
		    <v-select
		    	class="my-3"
		        v-model="item.arrival_id" 
		        :reduce="item => item.id"
		        :options="cities"
		        label="name"
			    @input="selectedChanged"
		        >
		    </v-select>
		</div>
		<div class="col-span-1 sm:col-span-1">
			<label for="type_of_ticket" class="block font-medium font-semibold text-gray-500">Type of ticket</label>
			<select name="type_of_ticket" v-model="item.type_of_ticket" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent">
				<option value="adult">Adult</option>
				<option value="senior">Senior</option>
				<option value="child">Child</option>
			</select>
		</div>

		<div v-if="showAvailableTrip" class="col-span-1 sm:col-span-1">
		    <label for="departure" class="font-semibold">Travel Date</label>
		    <input ref="datepicker" type="text" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" v-model="item.date" @change="travelDateChange" readonly>
		    <!-- <v-select
		    	class="my-3"
		        v-model="item.trip" 
		        :options="availableTrips"
		        label="display_trip_name"
		        >
		    </v-select> -->
		</div>
		<!-- <div class="col-span-1 sm:col-span-1">
		    <label for="departure" class="font-semibold">Bus</label>
		    <select name="bus" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" v-model="item.bus_id" :disabled="!buses" @change="busChangeHandler">
		    	<option v-for="bus in buses" :value="bus.id">{{ bus.name }} | {{ bus.plate }}</option>
		    </select>
		</div>
 -->
		<div class="col-span-2 sm:col-span-2">
		    <label for="departure" class="font-semibold">Time</label>
		    <select name="time" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" v-model="item.time_id" :disabled="!trip_times">
		    	<option v-for="time in trip_times" :value="time.id">{{ time.formatted_time }}</option>
		    </select>
		</div>

		<div class="grid grid-cols-3 gap-4">
			<div class="col-span-1 sm:col-span-1">
				<button tabindex="3" type="button" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-white bg-lightblue hover:bg-lighterblue focus:outline-none focus:border-lighterblue focus:shadow-outline-lighterblue active:bg-lighterblue focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out sm:leading-8" @click="nextForm" :disabled="disabledNextButton">
				    Next
				</button>
			</div>
			<div class="col-span-1 sm:col-span-1">
				<button tabindex="3" type="button" class="w-full flex justify-center py-2 px-4 border border-lighterblue text-sm font-medium rounded text-black bg-transparent hover:bg-lighterblue hover:text-white focus:outline-none focus:border-transparent focus:shadow-outline-transparent active:bg-transparent focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out sm:leading-8" @click="closeModal">
				    Cancel
				</button>
			</div>
		</div>

		<div class="grid grid-cols-3 gap-4 col-start-3 sm:col-start-3">
			<div class="col-span-full sm:col-span-full text-right">
				<label for="departure" class="font-semibold">Price: {{ totalPrice }}</label>
			</div>
		</div>
		
	</div>
</template>
<script type="text/javascript">
	import Vselect from "vue-select";
	import "vue-select/dist/vue-select.css";
	import flatpickr from 'flatpickr';
	import 'flatpickr/dist/flatpickr.css';
	import ArrayMixin from '../../mixins/array.js';

	export default {
		props: {
			cities: Array,
			officeId: Number,
		},

		data() {
			return {
				item: {
					trip: {},
					type_of_ticket: 'adult',
					date: null,
					time_id: null,

				},
				trips: [],
				trip_times: [],

				canEdit: false,
				disabled: false,
				showAvailableTrip: true,
				showDepartureSelection: false,
				price: 0,

				available_dates: [],
				buses: [],
			}
		},

		components: {
		    'v-select' : Vselect,
		},

		mixins: [ ArrayMixin ],

		watch: {
			'item.departure_id'(val) {
				if(this.showDepartureSelection) {
					this.item.departure = _.find(this.cities, (city) => { return city.id === val })
				}
			},

			'item.arrival_id'(val) {
				if(this.showDepartureSelection) {
					this.item.arrival = _.find(this.cities, (city) => { return city.id === val })
				}
			},

			'item.trip'(val) {
				this.item.trip_id = val.id;
			},

			'item.time_id'(val) {
				let time = _.find(this.trip_times, (time) => {
					return time.id == val;
				});

				this.item.time = time;
				this.item.driver_id = time.driver_id;
				this.item.bus_id = time.bus_id;
			},
		},

		computed: {
			disabledNextButton() {
				if(!_.isEmpty(this.item) && this.item.arrival_id && this.item.departure_id && !_.isEmpty(this.item.trip) && !_.isEmpty(this.item.type_of_ticket) && this.item.time_id && !_.isEmpty(this.item.date)) return false;

				return true;
			},

			availableTrips() {
				var trips = [];

				_.each(this.trips, (trip) => {
					_.each(trip.trips, (availableTrips) => {
						trips.push(availableTrips);
					})
				})

				return trips;
			},

			totalPrice() {
				if(!_.isEmpty(this.price)) {
					let total = 0;

					switch(this.item.type_of_ticket) {
						case 'adult':
							total = parseFloat(this.price.adult_one_way);
							break;
						case 'senior':
							total = parseFloat(this.price.senior_one_way);
							break;
						case 'child':
							total = parseFloat(this.price.child_one_way);
							break;

					}

					// total = parseFloat(this.price.departure_price) + parseFloat(this.price.arrival_price);

					return total.toFixed(2);
				}

				return "0.00";
			},
		},

		mounted() {

			if(!_.isEmpty(this.$parent.payloads.arrival) && !_.isEmpty(this.$parent.payloads.departure)) {
				this.item = this.$parent.payloads;
				this.selectedChanged();
				setTimeout(() => {
					this.travelDateChange();
				}, 1500);
			}

			if(!_.isEmpty(this.$parent.selectedTicket)) {
				this.item = this.$parent.selectedTicket
				this.selectedChanged();

				setTimeout(() => {
					this.travelDateChange();
					this.busChangeHandler();
				}, 1500)
			}
			
			setTimeout(() => {
				// this.canEdit = true;

				this.showDepartureSelection = true;
				if(!this.$parent.edit) {
					this.item.departure_id = this.officeId;
					// this.item.departure = _.find(this.cities, (city) => { return city.id === this.officeId })
				}
			}, 500)
		},

		methods: {
			setupflatpickr() {
				var $this = this;
				flatpickr(this.$refs.datepicker, {
					minDate: "today",
					enable: $this.available_dates
				});
			},

			closeModal() {
				this.$parent.$parent.toggled();
			},

			nextForm() {

				if(!this.item.bus_id || !this.item.driver_id) {
					this.$parent.showModal = true;
					this.$parent.modalTitle = 'Ooops';
					this.$parent.modalMessage = 'There is no bus assigned or driver in the selected time. Please update the trip in the selected date and time. Thank you!';

					return;
				}

				var bus_finder_payloads = {
					trip: this.item.trip,
					trip_id: this.item.trip.id,
					departure_id: this.item.departure_id,
					arrival_id: this.item.arrival_id,
					bus_id: this.item.bus_id,
					time_id: this.item.time_id,
				}

				// if(_.isEmpty(this.$parent.selectedTicket)) {

					this.$parent.loading = true;

					axios.post(this.$parent.fetchBusUrl, bus_finder_payloads)
						.then(response => {
							this.$parent.bus = response.data.bus_model;
							this.$parent.bus_info = response.data.bus;

							setTimeout(() => {
								this.$parent.payloads = this.item;
								this.$parent.payloads.trip = this.item.trip;
								this.$parent.payloads.trip_id = this.item.trip_id;
								this.$parent.payloads.driver_id = !_.isEmpty(this.item.time) ? this.item.time.driver_id : this.$parent.payloads.driver_id;
								this.$parent.payloads.bus_id = !_.isEmpty(this.item.time) ? this.item.time.bus_id : this.$parent.payloads.bus_id;
								this.$emit('nextStep', 3);
								this.$parent.loading = false;
							}, 500)
						}).catch(error => {
							this.$parent.loading = false;
						})
				// } else {
				// 	this.$emit('nextStep', 3);
				// }

				// axios.post(this.$parent.findAvailableTripUrl, this.item)
				// 	.then(response => {
						
				// 		this.$parent.availableTrip = response.data.trips;
				// 		this.$parent.price = response.data.price;
						
				// 		setTimeout(() => {
				// 			this.$parent.payloads = this.item;
				// 			this.$emit('nextStep', 2)
				// 			this.$parent.loading = false;
				// 		}, 500)
				// 	}).catch(errors => {
				// 		this.$parent.loading = false;
				// 	})

			},

			selectedChanged(type='arrival') {
				this.$parent.loading = true;

				if(type == 'departure') {
					this.showDepartureSelection = false;

					setTimeout(() => {
						this.showDepartureSelection = true;
					}, 500)
				}

				axios.post(this.$parent.findAvailableTripUrl, this.item)
					.then(response => {
						
						this.trips = response.data.trips;
						this.$parent.availableTrip = response.data.trips;
						this.$parent.price = response.data.price;
						this.price = response.data.price;
						this.available_dates = response.data.available_dates;
						this.buses = response.data.buses;

						setTimeout(() => {
							this.setupflatpickr();
						}, 1000)

						this.$parent.loading = false;

						if(!_.isEmpty(this.trips)) {
							this.showAvailableTrip = false;
							this.$parent.loading = true;

							setTimeout(() => {

								this.showAvailableTrip = true;
								
								if(!this.$parent.edit) {
									this.item.trip = this.availableTrips[0];
								}
								this.$parent.loading = false;
							}, 500)
						}

						
					}).catch(errors => {
						this.$parent.loading = false;
						this.$parent.modalMessage = errors.response.data.errors.error[0];
						this.$parent.modalTitle = 'Ooops! Something went wrong.';
						this.$parent.showModal = true;
					})
			},

			travelDateChange() {
				// this.$parent.loading = true;
				
				if(this.canEdit) {
					this.item.bus_id = null;
					this.item.time_id = null;
				} 

				if(!this.canEdit) {
					this.canEdit = true;
				}


				this.$nextTick(() => {
					this.$parent.loading = true;
					let tripHasSameDate = [];

					_.each(this.availableTrips, (trip) => {
						if(trip.date == this.item.date) {
							this.item.trip = trip;
							this.item.trip_id = trip.id;
							tripHasSameDate.push(trip.id);
						}
					})

					let payloads = {
						trip_ids: tripHasSameDate,
					}

					axios.post(this.$parent.getTripTimeUrl, payloads)
						.then(response => {
							this.trip_times = response.data.time;
							this.$parent.loading = false;
						}).catch(errors => {
							this.$parent.loading = false;
						})
				})

			},

			busChangeHandler() {
				// this.travelDateChange();
				this.$nextTick(() => {
					this.$parent.loading = true;
					let tripHasSameDate = [];

					_.each(this.availableTrips, (trip) => {
						if(trip.date == this.item.date) {
							this.item.trip = trip;
							this.item.trip_id = trip.id;
							tripHasSameDate.push(trip.id);
						}
					})

					let payloads = {
						trip_ids: tripHasSameDate,
						bus_id: this.item.bus_id
					}

					axios.post(this.$parent.getTripTimeUrl, payloads)
						.then(response => {
							this.trip_times = response.data.time;
							this.$parent.loading = false;
						}).catch(errors => {
							this.$parent.loading = false;
						})
				})
			}
		}
	}
</script>