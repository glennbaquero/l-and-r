<template>
	
	<div class="bg-white relative">
		<stepper :step="step"></stepper>
		<trip-seat-selection v-if="step == 2"></trip-seat-selection>
		<passenger-info-and-payment v-if="step == 3"></passenger-info-and-payment>
		<purchase-confirmation v-if="step == 4"></purchase-confirmation>
		<loading
			:show="loading"
		></loading>
		
		<modal
			:bodyMessage="modalMessage"
			:headerTitle="modalTitle"
			:show="showModal"
			@closeModal="showModal = false"
		></modal>
	</div>
</template>
<script type="text/javascript">
	import Stepper from './reservation/Stepper.vue';
	import TripSeatSelection from './reservation/TripSeatSelection.vue';
	import PassengerInfoAndPayment from './reservation/PassengerInfoAndPayment.vue';
	import PurchaseConfirmation from './reservation/PurchaseConfirmation.vue';
	import Loading from './Loading.vue';

	export default {
		name: 'PublicReservation',

		props: {
			tripTimeUrl: String,
			getBusUrl: String,
			paymentUrl: String,
			voucherValidateUrl: String,
			years: Object,
			savedPayload: Object,
			ticketTypes: Array,
		},

		data() {
			return {
				step: 2,

				trip_seat_selection_data: {
					passenger_count: 1
				},
				loading: false,
				modalMessage: '',
				modalTitle: '',
				showModal: false,

				success_data: {},

				selected_seat_list: [],
			}
		},

		components: {
			Stepper,
			TripSeatSelection,
			PassengerInfoAndPayment,
			PurchaseConfirmation,
			Loading,
		},

		methods: {
			nextStep(step) {
				this.step = step
			},

			backToForm(step) {
				this.step = step
			}
		}

	}
</script>