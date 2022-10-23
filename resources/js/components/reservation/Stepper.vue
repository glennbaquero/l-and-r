<template>
	<div class="h-24 hidden lg:block md:block md:hidden sm:hidden xl:block">
		<div class="flex items-center mb-4 md:w-7/12 mt-4 mx-auto sm:w-2/3 w-9/12 xl:w-7/12">
		    <div class="flex items-center text-lighterblue">
		    	<div class="xl:w-20">
			        <div class="absolute flex font-semibold h-20 md:text-left md:w-40 sm:text-left sm:w-1/6 sm:w-80 text-center text-xs uppercase xl:text-center xl:w-32 mt-2">
			        	<div class="flex-initial my-auto w-full">
				        	Search
			        	</div>
			   	 	</div>
			        <div class="border-2 bg-lighterblue border-lighterblue duration-500 ease-in-out h-8 ml-auto py-3 rounded-full transition w-8"></div>
		    	</div>
		    </div>
		    <div class="flex-auto border-t-2 transition duration-500 ease-in-out" :class="step >= 2 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
		    <div class="flex items-center" :class="step >= 2 ? 'text-lighterblue ' : 'text-gray-300'">
		    	<div class="flex xl:w-20">
				    <div class="border-lighterblue border-t-2 duration-500 ease-in-out flex-auto my-auto transition"></div>
			        <div class="absolute flex font-semibold h-20 md:text-left md:w-40 sm:text-center sm:w-1/6 sm:w-80 text-center text-xs uppercase w-1/6 xl:text-center xl:w-32 mt-2">
			        	<div class="flex-initial my-auto pt-4 w-full">
				        	Trip and Seat selection
			        	</div>
			   	 	</div>
			        <div class="border-2 duration-500 ease-in-out h-8 ml-auto py-3 rounded-full transition w-8" :class="step >= 2 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
		    	</div>
		    </div>
		    <div class="flex-auto border-t-2 transition duration-500 ease-in-out" :class="step >= 3 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
		    <div class="flex items-center" :class="step >= 3 ? 'text-lighterblue ' : 'text-gray-300'">
		    	<div class="flex xl:w-20">
				    <div class="border-t-2 duration-500 ease-in-out flex-auto my-auto transition" :class="step >= 3 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
			        <div class="absolute flex font-semibold h-20 md:text-left md:w-40 sm:text-center sm:w-1/6 sm:w-80 text-center text-xs uppercase w-1/5 xl:text-center xl:w-32 mt-2">
			        	<div class="flex-initial my-auto pt-4 sm:pt-7 w-full mt-4 sm:mt-0">
				        	Passenger and information payment
			        	</div>
			   	 	</div>
			        <div class="border-2 duration-500 ease-in-out h-8 ml-auto py-3 rounded-full transition w-8" :class="step >= 3 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
		    	</div>
		    </div>
		    <div class="flex-auto border-t-2 transition duration-500 ease-in-out" :class="step >= 4 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
		    <div class="flex items-center" :class="step >= 4 ? 'text-lighterblue ' : 'text-gray-300'">
		    	<div class="flex xl:w-20">
				    <div class="border-t-2 duration-500 ease-in-out flex-auto my-auto transition" :class="step >= 4 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
			        <div class="absolute flex font-semibold h-20 md:text-left md:w-40 sm:text-left sm:w-1/6 sm:w-80 text-center text-xs uppercase w-10 xl:text-center xl:w-32 mt-2">
			        	<div class="flex-initial my-auto pt-4 sm:pt-7 w-full mt-4 sm:mt-0">
				        	Purchase confirmation
			        	</div>
			   	 	</div>
			        <div class="border-2 duration-500 ease-in-out h-8 ml-auto py-3 rounded-full transition w-8" :class="step >= 4 ? 'bg-lighterblue border-lighterblue ' : 'bg-gray-300 border-gray-300'"></div>
		    	</div>
		    </div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props: {
			step: Number
		}
	}
</script>