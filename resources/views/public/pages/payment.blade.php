<x-public-layout>
	<div class="bg-white h-screen relative">

		<div class="lg:px-8 mx-auto px-4 relative sm:px-6 xl:w-4/6 lg:w-full xl:block lg:block md:hidden sm:hidden hidden">
			<div class="grid grid-cols-3 gap-5">
				<div class="col-span-full">
					<label class="flex font-semibold text-3xl">
						<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
						 Passenger Info
					</label>
				</div>
				<div class="col-span-2">
					<div class="gap-2 grid grid-cols-3">
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name">
						</div>
						<div class="col-span-1">
							<select name="ticket_type" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" >
								<option selected disabled value="none">Ticket Type</option>
								<option value="Adult">Adult</option>
							</select>
						</div>
						<div class="col-span-1">
							<input type="text" name="email" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Email">
						</div>
						<div class="col-span-1">
							<input type="text" name="cellphone_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Phone Number">
						</div>
						<div class="col-span-1">
							<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full">
								<option selected disabled value="none">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="col-span-full">
							<label><input type="checkbox" name="with_infant" class="inline-flex duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 rounded shadow-sm transition">&nbsp;Infant Travelling with adult?</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name">
						</div>
						<div class="col-span-1">
							<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full">
								<option selected disabled value="none">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="col-span-full">
							<label class="flex font-semibold text-3xl">
								<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
								 Payment details
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name">
						</div>
						<div class="col-span-1">
						</div>
						<div class="col-span-1">
							<input type="text" name="card_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Card Number">
						</div>
						<div class="col-span-1">
							<input type="text" name="expiration_date" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Expiration Date">
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="CVV">
						</div>
						<div class="col-span-full">
							<label class="flex">
								<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
								 Do you have a coupon?
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Enter the coupon here">
						</div>
						<div class="col-span-1 flex my-auto">
							<button class="bg-red-400 font-semibold p-3 rounded text-white w-32">
								Validate
							</button>
							<button class="ml-4">
								<svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
							</button>
						</div>
						<div class="col-span-1">
						</div>
						<div class="col-span-2">
							<label class="font-semibold text-2xl">
								Amount due: <span class="text-red-400">$ 23.00</span>
							</label>
						</div>
						<div class="col-span-1">
							<button class="bg-red-400 flex ml-auto p-3 rounded-full text-white w-9/12">
								Process Payment <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
							</button>
						</div>
					</div>
				</div>
				<div class="col-span-1">
					<div class="bg-gray-200 grid grid-cols-2 p-6 rounded-2xl">
						<div class="col-span-full">
							<label class="font-semibold">Departure Trip Info</label>
						</div>
						<div class="col-span-full">
							<label class="flex items-center">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
								&nbsp;Huntington Park, CA
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										03-01-2022
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										5:00 am
									</label>
								</div>
							</div>
						</div>
						<div class="col-span-full">
							<label class="flex items-center">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
								&nbsp;San Ysidro, CA
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										03-01-2022
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										5:00 am
									</label>
								</div>
							</div>
						</div>
						<div class="col-span-1">
							<label class="flex items-center font-semibold">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
								&nbsp;Adult x 1
							</label>
						</div>
						<div class="col-span-1 ml-auto my-auto">
							<label class="font-semibold">
								$ 23.00
							</label>
						</div>
						<div class="border-b border-black border-dashed col-span-full mt-4 mb-4">
						</div>
						<div class="col-span-1">
							<label class="flex items-center font-semibold">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
								&nbsp;AMOUNT DUE:
							</label>
						</div>
						<div class="col-span-1 ml-auto my-auto">
							<label class="font-semibold">
								$ 23.00
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="lg:px-8 mx-auto px-4 relative sm:px-6 w-full xl:hidden lg:hidden md:block sm:block">
			<div class="grid grid-cols-1 gap-5">
				<div class="col-span-1">
					<div class="bg-gray-200 grid grid-cols-2 p-6 rounded-2xl">
						<div class="col-span-full">
							<label class="font-semibold">Departure Trip Info</label>
						</div>
						<div class="col-span-full">
							<label class="flex items-center">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
								&nbsp;Huntington Park, CA
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										03-01-2022
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										5:00 am
									</label>
								</div>
							</div>
						</div>
						<div class="col-span-full">
							<label class="flex items-center">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
								&nbsp;San Ysidro, CA
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										03-01-2022
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										5:00 am
									</label>
								</div>
							</div>
						</div>
						<div class="col-span-1">
							<label class="flex items-center font-semibold">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
								&nbsp;Adult x 1
							</label>
						</div>
						<div class="col-span-1 ml-auto my-auto">
							<label class="font-semibold">
								$ 23.00
							</label>
						</div>
						<div class="border-b border-black border-dashed col-span-full mt-4 mb-4">
						</div>
						<div class="col-span-1">
							<label class="flex items-center font-semibold">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
								&nbsp;AMOUNT DUE:
							</label>
						</div>
						<div class="col-span-1 ml-auto my-auto">
							<label class="font-semibold">
								$ 23.00
							</label>
						</div>
					</div>
				</div>
				<div class="col-span-full">
					<label class="flex font-semibold text-3xl">
						<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
						 Passenger Info
					</label>
				</div>
				<div class="col-span-full">
					<div class="gap-2 grid grid-cols-1">
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name">
						</div>
						<div class="col-span-1">
							<select name="ticket_type" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" >
								<option selected disabled value="none">Ticket Type</option>
								<option value="Adult">Adult</option>
							</select>
						</div>
						<div class="col-span-1">
							<input type="text" name="email" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Email">
						</div>
						<div class="col-span-1">
							<input type="text" name="cellphone_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Phone Number">
						</div>
						<div class="col-span-1">
							<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full">
								<option selected disabled value="none">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="col-span-full">
							<label><input type="checkbox" name="with_infant" class="inline-flex duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 rounded shadow-sm transition">&nbsp;Infant Travelling with adult?</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name">
						</div>
						<div class="col-span-1">
							<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full">
								<option selected disabled value="none">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="col-span-full">
							<label class="flex font-semibold text-3xl">
								<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
								 Payment details
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name">
						</div>
						<div class="col-span-1">
						</div>
						<div class="col-span-1">
							<input type="text" name="card_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Card Number">
						</div>
						<div class="col-span-1">
							<input type="text" name="expiration_date" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Expiration Date">
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="CVV">
						</div>
						<div class="col-span-full">
							<label class="flex">
								<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
								 Do you have a coupon?
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Enter the coupon here">
						</div>
						<div class="col-span-1 flex my-auto mx-auto">
							<button class="bg-red-400 font-semibold p-3 rounded text-white w-32">
								Validate
							</button>
							<button class="ml-4">
								<svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
							</button>
						</div>
						<div class="col-span-1">
						</div>
						<div class="col-span-1">
							<label class="font-semibold text-2xl">
								Amount due: <span class="text-red-400">$ 23.00</span>
							</label>
						</div>
						<div class="col-span-1">
							<button class="bg-red-400 flex mx-auto p-3 rounded-full text-white">
								Process Payment <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-public-layout>