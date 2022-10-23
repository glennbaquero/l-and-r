<template>
	<div class="bg-white">
	  <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 bg-white">
	    <div class="grid grid-cols-3 gap-8">
	      <!-- <div class="col-span-3">
	        <div class="flex justify-center">
	          <div class="mb-3 xl:w-96">

                <google-auto-complete v-slot="{ address }">
		            <div class="input-group relative flex items-stretch w-full mb-4">
		              <input type="search" id="autocomplete" v-model="address.address_line_1" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
		              <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
		                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
		                  <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
		                </svg>
		              </button>
		            </div>
		        </google-auto-complete>
	          </div>
	        </div>
	      </div> -->
	      <div class="bg-white">
	        <div class="bg-primary nearest-terminals-list-container text-white overflow-auto" style="max-height: calc(100vw * 0.27);">
	          <div class="p-2 hover:bg-red-500 cursor-pointer" v-for="terminal in terminals" @click="selectTerminal(terminal)">
	            <p>{{ terminal.departure ? terminal.departure.name : terminal.name }} {{ terminal.departure ? terminal.departure.state : terminal.state }}</p>
	          </div>
	        </div>
	      </div>
	      <div class="bg-red col-span-2">
	        <div class="map-here w-full bg-red-300" style="height: calc(100vw * 0.27);">
	        	<google-map :origin="selectedTerminal.departure" :destination="selectedTerminal.departure" v-slot="{ directionsURL, hasOrigin }">
	        	    <iframe  style="height: 100%; width: 100%" id="map" :src="directionsURL" frameborder="0"></iframe>
	        	</google-map>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</template>
<script type="text/javascript">
	export default {
	    name: 'TerminalMapSection',

		props: {
			terminals: Array
		},

		data() {
			return {
				selectedTerminal: {},
				address: {}
			}
		},

		render() {
			return this.$scopedSlots.default({
				//
			});
		},

		mounted() {
			setTimeout(() => {
				this.selectedTerminal = this.terminals.length ? this.terminals[0] : {}
			}, 2000)
		},

		methods: {
			selectTerminal(terminal) {
				setTimeout(() => {
					this.selectedTerminal = terminal;
				}, 500)
			}
		}
	}
</script>