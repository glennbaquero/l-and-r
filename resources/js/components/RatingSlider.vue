<template>
	<div class="w-full">
	  	<div class="lg:py-24 mx-auto py-12 w-full">
	    	<div class="space-y-12 swiper-container">
	      		<div class="swiper-wrapper">
	        		<!-- Loop here -->
	        		<div class="swiper-slide bg-white rounded-lg text-center xl:text-left" v-for="rating in ratings">
	          			<div class="">
	          				<div class="h-28 w-full">
	          					<div class="bg-center bg-cover bg-no-repeat h-full">

	          						<div class="flex flex-col h-full items-center justify-center w-full">
	          							<div class="font-bold leading-6 p-4 space-y-1 text-3xl text-center text-lg text-white w-full ">
	          								<div class="flex items-start">
			          							<span>
			          								<svg class="w-6 h-6" :fill="rating.rate >= 1 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
			          							</span>
			          							<span>
			          								<svg class="w-6 h-6" :fill="rating.rate >= 2 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
			          							</span>
			          							<span>
			          								<svg class="w-6 h-6" :fill="rating.rate >= 3 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
			          							</span>
			          							<span>
			          								<svg class="w-6 h-6" :fill="rating.rate >= 4 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
			          							</span>
			          							<span>
			          								<svg class="w-6 h-6" :fill="rating.rate >= 5 ? 'red' : 'currentColor'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
			          							</span>
	          								</div>
	          							</div>
	          							<div class="h-1/6 px-3 text-left w-full" v-if="rating.message">
		          							<label class="duration-300 font-bold h-full p-2 rounded text-darkblue text-lg text-xs transition-colors w-1/2">"{{ rating.message }}"</label>
	          							</div>
	          							
	          						</div>
	          					</div>
	          				
	          				</div>
	            			<div class="px-3 py-10 space-y-2">
	              				<div class=" flex items-center leading-6 space-y-1 text-black text-sm">
	              					<img src="/icons/user.png" class="w-11">
	                				<label class="font-semibold px-3" v-if="rating.name">{{ rating.name }}</label>
	                				<label class="font-semibold px-3" v-else>Anonymous</label>
	              				</div>
	            			</div>
	          			</div>
	        		</div>
	     	 	</div>
	     	 	<!-- <div class="swiper-pagination lg:gap-8 lg:grid-cols-4 sm:gap-6 sm:grid sm:grid-cols-2 sm:space-y-0 space-y-4"></div> -->
	    	</div>
	  	</div>
	</div>
</template>
<script type="text/javascript">

import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';

export default {
	name: 'RatingSlider',

	props: {
		ratings: Array
	},

	data() {
		return {
			items: []
		}
	},

	mounted() {
		setTimeout(() => {

		})
		var options = {};

	       options = {
	       	  	// Optional parameters
	       	  	direction: 'horizontal',
	       	  	loop: true,
	       	  	slidesPerView: 1,
	       	  	spaceBetween: 20,
	       	  	autoplay: {
	       	   		delay: 2000,
	       	 	},

	       	 	// pagination: {
   	 	     //      el: ".swiper-pagination",
   	 	     //    },
	       }
		  
		new Swiper('.swiper-container', options);
	}
}

</script>