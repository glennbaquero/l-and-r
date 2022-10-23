<script type="text/javascript">
	export default {
		name: 'SuggestedLocationRedirect',

		props: {
			arrivalId: Number,
			departureId: Number,
			sendPayloadUrl: String,
		},

		data() {
			return {
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

			}
		},


		render() {
		    return this.$scopedSlots.default({
		        data: this.data,
		        search: this.search
		    });
		},

		methods: {
			search() {
				this.data.departure_id = this.departureId;
				this.data.arrival_id = this.arrivalId;
				
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