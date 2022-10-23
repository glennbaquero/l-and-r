<template>
	<div>
		<!-- Desktop -->
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

						<template v-for="(seat, seatIndex) in seat_selected_list">
							<div class="col-span-full">
								<label class="font-bold">Passenger {{ seatIndex+1 }}</label>
							</div>
							<div class="col-span-1">
								<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name" v-model="seat.passenger.first_name">
							</div>
							<div class="col-span-1">
								<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name" v-model="seat.passenger.last_name">
							</div>
							<div class="col-span-1">
								<select name="ticket_type" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="seat.passenger.ticket_type" @change="ticketTypeTotal()">
									<option selected disabled value="none">Ticket Type</option>
									<!-- <option v-for="ticket_type in ticket_types" :value="ticket_type">{{ ticket_type.name }}</option> -->
									<option value="adult">Adult</option>
									<option value="senior">Senior</option>
									<option value="child">Child</option>
								</select>
							</div>
							<div class="col-span-1">
								<input type="text" name="email" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Email" v-model="seat.passenger.email">
							</div>
							<div class="col-span-1">
								<input type="text" name="cellphone_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Phone Number" v-model="seat.passenger.cellphone_number" @input="handlePhoneFormat">
							</div>
							<div class="col-span-1">
								<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="seat.passenger.gender">
									<option selected disabled value="none">Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
								</select>
							</div>
							<div class="col-span-1">
								<input type="number" name="no_of_bags" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="No. of Bags" v-model="seat.no_of_bags" min="0" @change="baggageChangedHandler(seat)">
							</div>
							<div class="col-span-full">
								<b>Free Baggage Fee For: {{ freeBaggageFor }} | Extra Charge: {{ seat.total_baggage }}</b>
							</div>
							<div class="col-span-full">
								<label><input type="checkbox" name="with_infant" class="inline-flex duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 rounded shadow-sm transition" v-model="seat.passenger.with_infant">&nbsp;Infant Travelling with adult?</label>
							</div>
							<template v-if="seat.passenger.with_infant">
								<div class="col-span-1">
									<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name" v-model="seat.passenger.infant_firstname">
								</div>
								<div class="col-span-1">
									<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name" v-model="seat.passenger.infant_lastname">
								</div>
								<div class="col-span-1">
									<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="seat.passenger.infant_gender">
										<option selected disabled value="none">Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</template>
						</template>
						

						<div class="col-span-full">
							<label class="flex font-semibold text-3xl">
								<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
								 Payment details
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name" v-model="payloads.payment.cardholder_firstname">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name"v-model="payloads.payment.cardholder_lastname">
						</div>
						<div class="col-span-full">
							<input type="text" name="card_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Card Number" v-model="payloads.payment.card_number">
						</div>
						<div class="col-span-1">
							<!-- <input type="text" name="expiration_date" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Expiration Date" v-model="payloads.payment.expiration_date"> -->

							<select class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="payloads.payment.expiry_month">
							    <option selected disabled value="none">Month</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
							</select>
						</div>
						<div class="col-span-1">
                            <select class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="payloads.payment.expiry_year">
                                <option selected disabled value="none">Year</option>
                                <option v-for="year in years" :value="year">{{ year }}</option>
                            </select>
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="CVV" v-model="payloads.payment.cvv">
						</div>
						<div class="col-span-full">
							<label class="flex">
								<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
								 Do you have a coupon?
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Enter the coupon here" v-model="code">
						</div>
						<div class="col-span-1 flex my-auto">
							<button class="bg-red-400 font-semibold p-3 rounded text-white w-32" @click="validateCoupon">
								Validate
							</button>
							<button class="ml-4" @click="removeVoucher">
								<svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
							</button>
						</div>
						<div class="col-span-1">
						</div>
						<div class="col-span-2">
							<label class="font-semibold text-2xl">
								Amount due: <span class="text-red-400">$ {{ totalAmountDue }}</span>
							</label>
						</div>
						<div class="col-span-1">
							<button class="bg-red-400 flex ml-auto p-3 rounded-full text-white w-9/12" @click="processPayment">
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
								&nbsp;{{ trip_seat_selection_data.departure_city.name }}, {{ trip_seat_selection_data.departure_city.state }}
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										{{ trip_seat_selection_data.trip.formatted_date }}
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										{{ trip_seat_selection_data.time.formatted_time }}
									</label>
								</div>
							</div>
						</div>
						<div class="col-span-full">
							<label class="flex items-center">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
								&nbsp;{{ trip_seat_selection_data.arrival_city.name }}, {{ trip_seat_selection_data.arrival_city.state }}
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										{{ trip_seat_selection_data.trip.formatted_date }}
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										{{ trip_seat_selection_data.time.formatted_arrival_time }}
									</label>
								</div>
							</div>
						</div>
						<template v-for="(type, key, index) in ticketTypeCount"  v-if="type.count >= 1">
							<div class="col-span-1">
								<label class="flex items-center font-semibold w-max ">
									<svg class="h-9 p-2 rounded-full w-9" :class="index == 0 ? 'bg-white ' : 'bg-transparent'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" v-if="index == 0"></path></svg>
									&nbsp;<span class="uppercase">{{ key }}</span>&nbsp; x {{ type.count }}
								</label>
							</div>
							
							<div class="col-span-1 ml-auto my-auto">
								<label class="font-semibold">
									$ {{ type.total }}
								</label>
							</div>
						</template>
						
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
								$ {{ totalAmountDue }}
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile -->
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
								&nbsp;{{ trip_seat_selection_data.departure_city.name }}, {{ trip_seat_selection_data.departure_city.state }}
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										{{ trip_seat_selection_data.trip.formatted_date }}
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										{{ trip_seat_selection_data.time.formatted_time }}
									</label>
								</div>
							</div>
						</div>
						<div class="col-span-full">
							<label class="flex items-center">
								<svg class="bg-white h-9 p-2 rounded-full w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
								&nbsp;{{ trip_seat_selection_data.arrival_city.name }}, {{ trip_seat_selection_data.arrival_city.state }}
							</label>

							<div class="grid grid-cols-2 p-6">
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
										{{ trip_seat_selection_data.trip.formatted_date }}
									</label>
								</div>
								<div class="col-span-1">
									<label class="flex text-gray-500">
										<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
										{{ trip_seat_selection_data.time.formatted_arrival_time }}
									</label>
								</div>
							</div>
						</div>


						<template v-for="(type, key, index) in ticketTypeCount"  v-if="type.count >= 1">
							<div class="col-span-1">
								<label class="flex items-center font-semibold">
									<svg class="h-9 p-2 rounded-full w-9" :class="index == 0 ? 'bg-white ' : 'bg-transparent'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" v-if="index == 0"></path></svg>
									&nbsp;<span class="uppercase">{{ key }}</span>&nbsp; x {{ type.count }}
								</label>
							</div>
							<div class="col-span-1 ml-auto my-auto">
								<label class="font-semibold">
									$ {{ type.total }}
								</label>
							</div>
						</template>

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
								$ {{ totalAmountDue }}
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
						<template v-for="(seat, seatIndex) in seat_selected_list">
							<div class="col-span-full">
								<label class="font-bold">Passenger {{ seatIndex+1 }}</label>
							</div>

							<div class="col-span-1">
								<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name" v-model="seat.passenger.first_name">
							</div>
							<div class="col-span-1">
								<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name" v-model="seat.passenger.last_name">
							</div>
							<div class="col-span-1">
								<select name="ticket_type" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full"  v-model="seat.passenger.ticket_type"  @change="ticketTypeTotal()">
									<option selected disabled value="none">Ticket Type</option>
									<!-- <option v-for="ticket_type in ticket_types" :value="ticket_type">{{ ticket_type.name }}</option> -->
									<option value="adult">Adult</option>
									<option value="senior">Senior</option>
									<option value="child">Child</option>
								</select>
							</div>
							<div class="col-span-1">
								<input type="text" name="email" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Email" v-model="seat.passenger.email">
							</div>
							<div class="col-span-1">
								<input type="text" name="cellphone_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Phone Number" v-model="seat.passenger.cellphone_number" @input="handlePhoneFormat">
							</div>
							<div class="col-span-1">
								<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="seat.passenger.gender">
									<option selected disabled value="none">Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
								</select>
							</div>


							<div class="col-span-1">
								<input type="number" name="no_of_bags" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="No. of Bags" v-model="seat.no_of_bags" min="0" @change="baggageChangedHandler(seat)">
							</div>

							<div class="col-span-full">
								<b>Free Baggage Fee For: {{ freeBaggageFor }} | Extra Charge: {{ seat.total_baggage }}</b>
							</div>
							
							<div class="col-span-full">
								<label><input type="checkbox" name="with_infant" class="inline-flex duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 rounded shadow-sm transition" v-model="seat.passenger.with_infant">&nbsp;Infant Travelling with adult?</label>
							</div>
							<template v-if="seat.passenger.with_infant">
								<div class="col-span-1">
									<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name" v-model="seat.passenger.infant_firstname">
								</div>
								<div class="col-span-1">
									<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name" v-model="seat.passenger.infant_lastname">
								</div>
								<div class="col-span-1">
									<select name="gender" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="seat.passenger.infant_gender">
										<option selected disabled value="none">Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</template>
						</template>
						
						
						<div class="col-span-full">
							<label class="flex font-semibold text-3xl">
								<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
								 Payment details
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="first_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="First Name" v-model="payloads.payment.cardholder_firstname">
						</div>
						<div class="col-span-1">
							<input type="text" name="last_name" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Last Name" v-model="payloads.payment.cardholder_lastname">
						</div>
						<div class="col-span-1">
							<input type="text" name="card_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Card Number" v-model="payloads.payment.card_number">
						</div>
						<div class="col-span-1">
							<input type="text" name="card_number" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Card Number" v-model="payloads.payment.card_number">
						</div>
						<div class="col-span-1">
							<!-- <input type="text" name="expiration_date" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Expiration Date" v-model="payloads.payment.expiration_date"> -->
							<select class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="payloads.payment.expiry_month">
							    <option selected disabled value="none">Month</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
							</select>
						</div>
						<div class="col-span-1">
							<select class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" v-model="payloads.payment.expiry_year">
							    <option selected disabled value="none">Year</option>
                                <option v-for="year in years" :value="year">{{ year }}</option>
							</select>
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="CVV" v-model="payloads.payment.cvv">
						</div>
						<div class="col-span-full">
							<label class="flex">
								<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
								 Do you have a coupon?
							</label>
						</div>
						<div class="col-span-1">
							<input type="text" name="cvv" class="border-gray-300 duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto my-3 p-4 placeholder-gray-400 rounded shadow-sm transition w-full" placeholder="Enter the coupon here" v-model="code">
						</div>
						<div class="col-span-1 flex my-auto mx-auto">
							<button class="bg-red-400 font-semibold p-3 rounded text-white w-32" @click="validateCoupon">
								Validate
							</button>
							<button class="ml-4" @click="removeVoucher">
								<svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
							</button>
						</div>
						<div class="col-span-1">
						</div>
						<div class="col-span-1">
							<label class="font-semibold text-2xl">
								Amount due: <span class="text-red-400">$ {{ price.adult_one_way }}</span>
							</label>
						</div>
						<div class="col-span-1">
							<button class="bg-red-400 flex mx-auto p-3 rounded-full text-white" @click="processPayment">
								Process Payment <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">

	import ResponseMixin from '../../mixins/response.js';
	export default {
		name: 'PassengerInfoAndPayment',

		data() {
			return {
				payloads: {
					with_infant: false,
					infant_gender: 'none',
					infant_firstname: '',
					infant_lastname: '',

					gender: 'none',
					ticket_type: 'none',
					cellphone_number: null,
					no_of_bags: null,
					payment: {
						expiry_month: 'none',
						expiry_year: 'none',
					}
				},

				years: this.$parent.years,
				ticket_types: this.$parent.ticketTypes,
				price: this.$parent.trip_seat_selection_data.price,
				trip_seat_selection_data: this.$parent.trip_seat_selection_data.payloads,

				seat_selected_list: this.$parent.selected_seat_list,


				voucher: {},
				voucher_discount: 0,
				totalTicketType: 0,
				ticketTypeCount: {
					adult: {
						count: 0,
						total: 0,
					},
					senior: {
						count: 0,
						total: 0,
					},
					child: {
						count: 0,
						total: 0,
					}
				},
				totalBaggageFee: 0,
				code: null,

			}
		},

		mixins: [ ResponseMixin ],

		computed: {
			ticketType() {


				return this.payloads.ticket_type != "none" ? this.payloads.ticket_type.toUpperCase() : "No ticket type selected";
			},

			totalAmountDue() {
				let price_trip = 0;
				// let total = price_trip - this.ticketTypeTotal()Discount;
				
				let total = this.totalTicketType;

				if(!_.isEmpty(this.voucher)) {
					total *= this.voucher_discount;
				}

				let totalBaggageFee = this.totalBaggageFee;


				total += parseFloat(totalBaggageFee);


				// total += parseFloat(this.totalExtraCharge);

				return total.toFixed(2)
			},

			totalPassenger() {
				return this.$parent.trip_seat_selection_data.passenger_count;
			},

			freeBaggageFor() {
				return this.$parent.trip_seat_selection_data.payloads.trip.max_baggage;
			},

			totalExtraCharge() {

				let total = 0;

				// check if max baggage is exceed
				
				if(this.$parent.trip_seat_selection_data.payloads.trip.max_baggage < this.payloads.no_of_bags) {
					total = (this.payloads.no_of_bags - this.$parent.trip_seat_selection_data.payloads.trip.max_baggage) * parseFloat(this.$parent.trip_seat_selection_data.payloads.trip.additional_bag_fee);

					return total.toFixed(2);
				}

				return "0.00";
			},
		}, 

		watch: {
			ticketTypeCount(val) {
				this.totalTicketType = 0;
				
				_.each(this.ticketTypeCount, (type) => {
					this.totalTicketType += type.total;
				})
			}
		},

		mounted() {
			if(!_.isEmpty(this.$parent.savedPayload.passenger_info)) {
				this.payloads = this.$parent.savedPayload.passenger_info

				this.ticketTypeTotal()
			}
		},


		methods: {
			handlePhoneFormat(e) {
				var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
				e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
				this.payloads.cellphone_number = e.target.value;
			},

			processPayment() {
				this.$parent.loading = true;

				let payloads = {
					trip_id: this.$parent.trip_seat_selection_data.payloads.trip_id,
					bus_model_column_id: this.$parent.trip_seat_selection_data.seat_selected.id,
					passenger: this.payloads,
					arrival_id: this.$parent.trip_seat_selection_data.payloads.arrival_city.id,
					departure_id: this.$parent.trip_seat_selection_data.payloads.departure_city.id,
					number_of_ticket: this.$parent.trip_seat_selection_data.payloads.passenger_count,
					amount: this.totalAmountDue,
					trip_time_id: this.$parent.trip_seat_selection_data.payloads.time.id,
					driver_id: this.$parent.trip_seat_selection_data.payloads.time.driver_id,
					type_of_ticket: this.payloads.ticket_type,

					seat_selected_list: this.seat_selected_list
				};

				axios.post(this.$parent.paymentUrl, payloads) 
					.then(response => {
						this.$parent.loading = false;
						this.$parent.showModal = true;
						this.$parent.modalMessage = response.data.message; 
						this.$parent.modalTitle = response.data.title; 

						this.$parent.success_data = response.data;
						this.$parent.step = 4;
					}).catch(error => {
						this.$parent.loading = false;
						this.$parent.showModal = true;
						this.$parent.modalMessage = this.parseResponse(error);
						this.$parent.modalTitle = 'Ooops!'; 

					})
			},


			validateCoupon() {
				this.$parent.loading = true;

				var payload = {
					code: this.code,
					trip_date: this.trip_seat_selection_data.trip.date,
					route_id: this.trip_seat_selection_data.trip.route_id,
					passenger: this.payloads.first_name+' '+this.payloads.last_name
				}
				axios.post(this.$parent.voucherValidateUrl, payload)
					.then(response => {
						this.$parent.loading = false;
						this.voucher = response.data.coupon;
						this.voucher_discount = response.data.discount;
						this.$parent.showModal = true;
						this.$parent.modalMessage = response.data.message; 
						this.$parent.modalTitle = response.data.title; 
					}).catch(errors => {
						this.$parent.loading = false;
					})
			},

			removeVoucher() {
				this.voucher = {};
				this.voucher_discount = 0;
			},

			ticketTypeTotal() {
				let price_trip = 0;
				let total = 0;

				this.ticketTypeCount = {
					adult: {
						count: 0,
						total: 0,
					},
					senior: {
						count: 0,
						total: 0,
					},
					child: {
						count: 0,
						total: 0,
					}
				};


				_.each(this.seat_selected_list, (seat) => {
					switch(seat.passenger.ticket_type) {
						case 'adult': 
							price_trip += parseFloat(this.price.adult_one_way);
							break;
						case 'senior': 
							price_trip += parseFloat(this.price.senior_one_way);
							break;
						case 'child': 
							price_trip += parseFloat(this.price.child_one_way);
							break;
					}

					this.ticketTypeCount[seat.passenger.ticket_type].count += 1;
					this.ticketTypeCount[seat.passenger.ticket_type].total = price_trip;
					
				})


				total = price_trip;

				// return total * this.totalPassenger;
				return total;
			},

			baggageChangedHandler(seat) {

				let total = 0;

				// check if max baggage is exceed
				if(this.$parent.trip_seat_selection_data.payloads.trip.max_baggage < parseInt(seat.no_of_bags)) {
					total = (parseInt(seat.no_of_bags) - this.$parent.trip_seat_selection_data.payloads.trip.max_baggage) * parseFloat(this.$parent.trip_seat_selection_data.payloads.trip.additional_bag_fee);

				}

				seat.total_baggage = total.toFixed(2);
				seat.passenger.total_baggage = total.toFixed(2);
				seat.passenger.no_of_bags = seat.no_of_bags;

				this.totalBaggageFee = 0;

				_.each(this.seat_selected_list, (_seat) => {
					this.totalBaggageFee += parseFloat(_seat.total_baggage);
				});

			}

		}
	}
</script>