<x-public-layout>
	<div class="bg-white relative">
		<div class="flex justify-between relative">
			<video
			    autoplay
			    loop
			    muted
			    class="hidden relative sm:block w-full"
			  >
			    <source
			      src="https://travelfronteras.com/wp-content/uploads/2020/09/background-travelfronteras.mp4"
			      type="video/mp4"
			    />
			    Your browser does not support the video tag.
			</video>
			{{--  --}}
			<div class="bg-black bg-darkblue block h-full opacity-70 relative sm:hidden w-full">
				<div class="h-screen"></div>
			</div>
			<div class="absolute flex h-full lg:px-8 lg:py-40 px-4 sm:px-6 w-full">
			  	<travel-locator
			  		get-cities-url="{{ route('get-cities') }}"
			  		find-available-trip-url="{{ route('web.ticket.find-available-trip') }}"
			  		send-payload-url="{{ route('web.save-payload') }}"
			  		:has-user-logged-in="{{ $hasUserLoggedIn }}"
			  	></travel-locator>

			</div>
		</div>
	  	
	  	<div class="bg-darkblue lg:flex lg:justify-between lg:px-8 mt-0 mx-auto relative sm:mt-0">

	  		<div class="lg:px-8 mx-auto px-4 py-32 rounded-lg sm:px-6 sm:py-32 w-full z-10">
	  			<div class="items-center lg:grid-cols-8 md:grid-cols-5 sm:grid-cols-2">
	  				<div class="font-extrabold leading-5 text-3xl text-gray-700 text-sm text-center">
  						<label class="text-white">
	  					  	Suggested Locations
  						</label>
	  				</div>

	  				<div class="">
	  				  	<div class="lg:py-24 mx-auto py-12 w-full">
	  				    	<div class="space-y-12">
	  				      		<ul class="lg:gap-8 lg:grid-cols-4 sm:gap-6 sm:grid sm:grid-cols-2 sm:space-y-0 space-y-4">
	  				        		{{-- Loop here --}}
	  				        		@foreach($suggested_locations as $suggested_location)
	  				        		<li class="bg-white rounded-lg text-center xl:text-left">
	  				          			<div class="">
	  				          				<div class="h-64">
	  				          					<div class="bg-center bg-cover bg-no-repeat h-full" style="background-image: url({{asset('tijuan-bus.jpg')}});">

	  				          						<div class="flex flex-col h-full items-center justify-center w-full">
	  				          							<div class="font-bold leading-6 p-4 space-y-1 text-3xl text-center text-lg text-white w-full">
		  				          							<label>{{ $suggested_location->arrival->name }}</label>
	  				          							</div>
	  				          							<div class="h-1/6 text-center w-full">
	  				          								<suggested-location-redirect v-slot="{ data, search }" send-payload-url="{{ route('web.save-payload') }}" :arrival-id="{{ $suggested_location->arrival->id }}" :departure-id="{{ $suggested_location->route->departure->id }}">
			  				          							<button @click="search()" class="bg-red-500 duration-300 font-bold h-full p-2 rounded text-lg text-white text-xs transition-colors w-1/2">Book Trip</button>
			  				          						</suggested-location-redirect>
	  				          							</div>
	  				          							
	  				          						</div>
	  				          					</div>
	  				          				
	  				          				</div>
	  				            			<div class="px-6 py-10 space-y-2 xl:flex xl:items-center xl:justify-between xl:px-10">
	  				              				<div class="font-medium leading-6 space-y-1 text-black text-lg">
	  				                				<h4 class="font-bold">From {{ $suggested_location->route->departure->name }}</h4>

	  				                				<p class="font-bold text-red-500">
	  				                					${{ $suggested_location->arrival->arrival_prices ? ($suggested_location->arrival->arrival_prices()->where('departure_id', $suggested_location->route->departure->id)->first() ? $suggested_location->arrival->arrival_prices()->where('departure_id', $suggested_location->route->departure->id)->first()->arrival_price : '0.00') : '0.00' }} One Way
	  				                				</p>
	  				                				<p class="font-bold text-red-500">
	  				                					${{ $suggested_location->arrival->arrival_prices ? ($suggested_location->arrival->arrival_prices()->where('departure_id', $suggested_location->route->departure->id)->first() ? $suggested_location->arrival->arrival_prices()->where('departure_id', $suggested_location->route->departure->id)->first()->round_trip_price : '0.00') : '0.00' }} Round Trip
	  				                				</p>
	  				              				</div>
	  				            			</div>
	  				          			</div>
	  				        		</li>

	  				        		@endforeach

	  				     	 	</ul>
	  				    	</div>
	  				  	</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="bg-white lg:flex lg:justify-between lg:px-8 mt-0 mx-auto relative sm:mt-0">
	  		<div class="lg:px-8 mx-auto px-4 py-32 rounded-lg sm:px-6 sm:py-32 w-full z-10">
	  			<div class="items-center lg:grid-cols-8 md:grid-cols-5 sm:grid-cols-2">
	  				<div class="font-extrabold leading-5 text-3xl text-gray-700 text-sm text-center">
  						<label class="text-black">
	  					  	What Makes Us Unique
  						</label>
	  				</div>
	  			</div>
	  			<div class="items-center lg:grid-cols-8 md:grid-cols-5 sm:grid-cols-2">
  					{{-- <what-make-us-unique-slider></what-make-us-unique-slider> --}}
	  			</div>
	  		</div>
	  	</div>

	  	<div class="bg-gray-50 lg:flex lg:justify-between lg:px-8 mt-0 mx-auto relative sm:mt-0">

	  		<div class="h-full w-full z-10">
	  			<div class="grid lg:grid-cols-2 md:grid-cols-2 py-11 sm:grid-cols-1">
	  				<div class="col-md-1 relative">
	  					<img src="{{asset('bus-side.png')}}" class="absolute bottom-0 m-auto top-0 w-screen"></img>
	  				</div>
	  				<div class="col-md-1 p-10 xl:pr-72">
	  					<label class="font-bold text-3xl text-blue-900">Our Story</label>
	  					<div class=" py-12">
		  					<hr class="border-4 rounded w-24">
		  				</div>
	  					<div class="">
		  					<p class="leading-7 text-sm">Before Mr. Lopez started Fronteras Del Norte he worked as a driver for the company for more than 10 years. Being the trailblazer that he was, Mr. Lopez purchased the company with the hopes of expansion and providing a better service to his customers. He began with only one vehicle a 19 passenger mini bus that he purchased with all the money he had in his pocket and drove it down to the border from Los Angeles for over 10 years. As the demand for the service grew he saw the need to purchase 3 additional vehicles, but knew he needed drivers, dispatchers and a maintenance team. His family was up! The Lopez Family has continued to pioneer his vision for a better service by adding more destinations, newer model buses, innovative waiting areas, and more amenities on board...</p>

		  					<a href="{{ route('web.about-us') }}">
		  						<button class="bg-red-500 duration-300 font-semibold mt-5 p-2 rounded text-sm text-white text-xs transition-colors w-2/6">
		  							Learn more
		  						</button>
		  					</a>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="bg-white lg:flex lg:justify-between mt-0 mx-auto px-16 relative sm:mt-0">

	  		<div class="h-full w-full z-10">
	  			<div class="lg:grid-cols-2 md:grid-cols-2 py-11 sm:grid-cols-1 xl:grid">
	  				<div class="col-md-1 xl:pl-24 xl:py-24">
	  					<div class="w-full">
	  						<p class="font-bold text-black">Look Inside</p>
		  					<label class="font-bold text-5xl text-blue-900">Why people love riding with us! </label>
	  					</div>
	  					<rating-slider
	  						:ratings="{{ $ratings }}"
	  					></rating-slider>
	  					<rating-form
	  						store-url="{{ route('store.rate') }}"
	  					></rating-form>
	  				</div>
	  				<div class="col-md-1">
	  					<img class="w-screen" src="{{asset('Smiling-on-bus.jpg')}}">
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	</div>
</x-public-layout>