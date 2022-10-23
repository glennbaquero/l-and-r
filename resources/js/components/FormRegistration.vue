<template>
	<div class="mx-auto lg:w-5/12 md:w-full mt-8 sm:w-full">
	    <div class="py-8 px-4 sm:rounded-lg sm:px-10">
            
            <loading :show="loading"></loading>

            <modal
            	:bodyMessage="modalMessage"
            	:headerTitle="modalTitle"
            	:show="showModal"
            	@closeModal="closeModal"
            ></modal>

            <div class="gap-4 grid grid-cols-1 sm:gap-2 sm:grid-cols-2">
                <div class="col-md-1">
                    <label for="first_name" class="block text-sm font-medium leading-5 mb-2">
                        First name
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2 ">
                            <span class="p-1 focus:outline-none focus:shadow-outline">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>                         
                            </span>
                        </span>

                        <input tabindex="1" type="text" id="first_name" name="first_name"  required class="appearance-none block w-full pl-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-8 " v-model="payload.first_name"/>
                    </div>
                </div>

                <div class="col-md-1">
                    <label for="last_name" class="block text-sm font-medium leading-5 mb-2">
                        Last name
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <span class="p-1 focus:outline-none focus:shadow-outline">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>                         
                            </span>
                        </span>

                        <input tabindex="1" type="text" id="last_name" name="last_name"  required class="appearance-none block w-full pl-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-8 " v-model="payload.last_name"/>
                    </div>
                </div>

                <div class="col-md-1">
                    <label for="email" class="block text-sm font-medium leading-5 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <span class="p-1 focus:outline-none focus:shadow-outline">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clipRule="evenodd" /></svg>                    
                            </span>

                        </span>

                        <input tabindex="1" type="email" id="email" name="email"  required class="appearance-none block w-full pl-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-8" v-model="payload.email"/>
                    </div>
                </div>

                <div class="col-md-1">
                    <label for="phone_number" class="block text-sm font-medium leading-5 mb-2">
                        Phone number
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <span class="p-1 focus:outline-none focus:shadow-outline">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" /></svg>                        
                            </span>
                        </span>
                        <phone-number v-slot="{ handlePhoneFormat }">
                            <input tabindex="1" type="text" id="mobile_number" name="mobile_number"  required class="appearance-none block w-full pl-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-8" @input="handlePhoneFormat"  v-model="payload.mobile_number" />
                        </phone-number>
                    </div>
                </div>

                <div class="col-md-1">
                    <label for="password" class="block text-sm font-medium leading-5 mb-2">
                        Password
                    </label>
                    <toggle>
                        <div slot-scope="{ display, toggled }" class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <span class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>                      
                                </span>
                            </span>

                            <input tabindex="2" id="password" :type="display ? 'text' : 'password'" name="password" required class="appearance-none block w-full px-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:leading-8 " :class="display ? 'sm:text-sm' : 'sm:text-xl'" v-model="payload.password" />

                            <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                <a href="#" @click.prevent="toggled" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg v-if="!display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                </a>
                            </span>
                        </div>
                    </toggle>
                </div>

                <div class="col-md-1">
                    <label for="confirmation_password" class="block text-sm font-medium leading-5 mb-2">
                        Confirm Password
                    </label>
                    <toggle>
                        <div slot-scope="{ display, toggled }" class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <span class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>                      
                                </span>
                            </span>

                            <input tabindex="2" id="confirmation_password" :type="display ? 'text' : 'password'" name="confirmation_password" required class="appearance-none block w-full px-12 py-2 border border-white bg-transparent rounded-full placeholder-gray-400 tracking-wider focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:leading-8" :class="display ? 'sm:text-sm' : 'sm:text-xl'" v-model="payload.password_confirmation"/>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                <a href="#" @click.prevent="toggled" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg v-if="!display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                </a>
                            </span>
                        </div>
                    </toggle>
                </div>
                
            </div>
            

            <div class="mt-10">
                <span class="block w-full shadow-sm">
                    <button tabindex="3" type="button" @click="actionHandler" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out sm:leading-8">
                        Sign up
                    </button>
                </span>
            </div>
            <div class="mt-2">
                <span class="block w-full shadow-sm">
                    <a href="/travel/login" tabindex="3" class="active:bg-blue-700 bg-white border border-transparent duration-150 ease-in-out flex focus:border-blue-700 focus:outline-none focus:shadow-outline-blue font-medium hover:bg-blue-500 hover:text-white justify-center px-4 py-2 rounded-full sm:leading-8 text-black text-sm transition w-full">
                        Back to login
                    </a>
                </span>
            </div>
	    </div>
	</div>
</template>

<script type="text/javascript">
	import Modal from './Modal.vue';
	import ResponseMixin from '../mixins/response.js';

	export default {
		name: 'FormRegistration',

		props: {
			url: String,
		},

		data() {
			return {
				payload: {},
				result: null,
				loading: false,
				modalMessage: null,
				modalTitle: null,
				showModal: false,
                hasError: false,
			}
		},


		components: {
		    Modal,
		},

		mixins: [ ResponseMixin ],

		render() {
		    return this.$scopedSlots.default({
		        actionHandler: this.actionHandler,
		        payload: this.payload,
		        result: this.result,
		        loading: this.loading,
		    });
		},

		methods: {
			actionHandler() {
				//loading
				this.loading = true;
				// this.$children[0].display = true;
				
				axios.post(this.url, this.payload) 
					.then(response => {
						//loading
						this.loading = false;

						this.payload = {};
						
						//modal
						this.modalMessage = response.data.message;
						this.modalTitle = 'Registration success!'
						this.showModal = true;
					}).catch(error => {
						this.loading = false;
						//modal
						
						this.modalMessage = this.parseResponse(error);
						this.modalTitle = 'Registration failed!'
						this.showModal = true;
                        this.hasError = true;
					})
			},

            closeModal() {
                this.showModal = false;

                if(!this.hasError) {
                    window.href.location = '/travel/login'
                }

                this.hasError = false;
            }
		}
	}
</script>