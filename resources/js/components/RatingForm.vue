<template>
	<div>
		<button class="bg-red-500 duration-300 font-semibold p-2 rounded sm:mb-7 text-sm text-white text-xs transition-colors w-3/12" @click="display = true">
			Write a review
		</button>
	    <div v-if="display" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex text-black">
	        <div class="max-h-screen max-w-lg mx-auto my-6 relative w-full">
	            <!--content-->

	            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
	                <!--header-->
	                
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <h3 class="text-3xl font-semibold">
                           Write a review
                        </h3>
                        <a  @click="closeModal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    </div>

	                <!--body-->
	                <div class="relative p-6 flex-auto" >
	                	<div class="grid grid-cols-2">
	                		<div class="col-span-full">
	                			<label class="block font-medium text-sm text-gray-700">Name</label>
	                			<input type="text" name="" class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent" v-model="payloads.name">
	                		</div>
	                		<div class="col-span-full">
	                			<label class="block font-medium text-sm text-gray-700">Rate Us</label>
	                			<div class=" flex items-start">
	                				<span>
	                					<svg @click="payloads.rate = 1" class="h-10 w-10" :fill="payloads.rate >= 1 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
	                				</span>
	                				<span>
	                					<svg @click="payloads.rate = 2" class="h-10 w-10" :fill="payloads.rate >= 2 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
	                				</span>
	                				<span>
	                					<svg @click="payloads.rate = 3" class="h-10 w-10" :fill="payloads.rate >= 3 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
	                				</span>
	                				<span>
	                					<svg @click="payloads.rate = 4" class="h-10 w-10" :fill="payloads.rate >= 4 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
	                				</span>
	                				<span>
	                					<svg @click="payloads.rate = 5" class="h-10 w-10" :fill="payloads.rate >= 5 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
	                				</span>
	                			</div>
	                		</div>
	                		<div class="col-span-full">
	                			<label class="block font-medium text-sm text-gray-700">Message</label>
	                			<textarea class="form-input w-full mx-auto my-3 py-2 px-3 bg-gray-200 rounded shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out leading-none border-transparent"  v-model="payloads.message"></textarea>
	                		</div>
	                		<div class="xl:col-span-1 sm:col-span-full">
                				<button class="bg-red-500 duration-300 font-semibold p-2 rounded sm:mb-7 text-sm text-white text-xs transition-colors" @click="sendRate">
                					Send review
                				</button>
	                		</div>
	                	</div>
	                </div>

	            </div>
	        </div>
	    </div>
	    <div v-if="display" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
	</div>
</template>

<script type="text/javascript">
	export default {
		name: 'RatingForm',
		props: {
			storeUrl: String
		},

		data() {
			return {
				display: false,
				payloads: {
					rate: 0,
					name: null,
					message: null,
				}
			}
		},


	    render() {
	        return this.$scopedSlots.default({
	        	//
	        });
	    },

		methods: {
			closeModal() {
				this.display = false
			},

			sendRate() {
				axios.post(this.storeUrl, this.payloads)
					.then(response => {
						this.payloads = {
							rate: 0,
							name: null,
							message: null,
						}

						this.display = false
					}).catch(errors => {

					})
			}
		}
	}
</script>