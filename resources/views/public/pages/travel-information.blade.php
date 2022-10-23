<x-public-layout>
  <div class="bg-white">
    <div class="max-w-screen-2xl mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8">
      <p class="mt-1 text-4xl leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">Travel Information</p>
    </div>
  </div>
  <div class="bg-white">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 bg-white">
      <div class="xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="xl:col-span-1 hidden xl:block">
          <div class="travel-info-container flex flex-col sticky top-20">
            <a href="#luggage" class="bg-primary mb-1 p-3 pl-5 rounded text-white travel-info-sections hover:shadow-2xl hover:opacity-75">Luggage</a>
            <a href="#children" class="bg-primary mb-1 p-3 pl-5 rounded text-white travel-info-sections hover:shadow-2xl hover:opacity-75">Children</a>
            <a href="#pets" class="bg-primary mb-1 p-3 pl-5 rounded text-white travel-info-sections hover:shadow-2xl hover:opacity-75">Pets</a>
          </div>
        </div>
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
          {{-- Luggage --}}
          <div class="md:grid md:gap-8">
            <img class="m-auto" src="{{ asset('luggage-dimensions.png') }}"  alt="Autobuses Fronteras Del Norte" />
          </div>
          <div class="md:grid text-gray-600 md:gap-1.5">
            <h1 class="font-extrabold text-2xl mb-3" id="luggage">Luggage</h1>
            <p class="leading-5 font-semibold text-sm">Each Passenger will get to check-in 2 pieces of luggage and 1 standard size carry on free of charge.</p>
            <p class="leading-5 text-sm">The carry-on must be small enough to fit in the overhead compartment* or under the seat. The two pieces of check-in luggage must each weigh no more than 50 pounds. A $10 fee will be charged for the 3rd piece of checked-in luggage and any additional ones.</p>
            <p class="leading-5 text-sm">You can bring a stroller in addition to your maximum checked baggage allowance, and a car seat in addition to your maximum carry-on baggage.</p>
            <p class="leading-5 text-sm">Please note that TVs, bicycles, and fishing poles must be packed inside a box or another means of compact storage.</p>
            <p class="leading-5 text-sm">Please remember to clearly identify each piece of luggage with your <span class="font-semibold">name, email and phone number</span>. Add your name inside your bag just in case the tag breaks off.</p>
            <p class="leading-5 font-semibold text-sm">If you have a connecting trip, please note that you are responsible for retrieving your luggage from one motor coach and placing it in the connecting vehicle.</p>
          </div>
          <div class="md:grid text-gray-600 xl:col-span-2 md:gap-1.5 md:col-span-2">
            <h1 class="font-extrabold text-lg mb-3">Lost or Damaged Luggage</h1>
            <p class="leading-5 text-sm">If Fronteras Del Norte is responsible (or liable) for your baggage getting lost or damaged, you should be able to claim compensation. To process the claim you’ll need to contact us within 72 working hours after the conclusion of your trip and have at hand the baggage tag that was given to you when you checked your bag. Fronteras Del Norte may acknowledge a total baggage liability of up to $125.00 per checked bag. If your checked baggage is worth more than said amount, Fronteras Del Norte can’t pay any more than the mentioned amount. This applies to those bags that fit within our weight and size regulations. Liability applies only to those bags lost or damaged that were checked in. Fronteras Del Norte is not liable for bags that were not checked in. Fronteras Del Norte reserves the right to try to recover their lost luggage for a minimum of 15 days before giving any refund.</p>
            <p class="leading-5 text-sm">Personal belongings inside the cabin are exclusive passenger’s responsibility; Fronteras Del Norte is not liable for its loss. If you lose a personal item in your seat, please report this as soon as possible. Once you provide a description, we will make the best effort to locate the item in the unit. If the search is successful, we will contact you to arrange the return of your property. Lost or delayed baggage will not be delivered outside of the United States. We will gladly assist you in arranging for delivery outside of the United States for an extra charge. If you have any questions, please don’t hesitate to contact us at info@fronterasdelnorte.com</p>
          </div>

          {{-- Children --}}
          <div class="md:grid text-gray-600  md:col-span-2 mt-10">
            <h1 class="font-extrabold text-2xl md:mb-3" id="children">Children</h1>
          </div>
          <div class="md:grid text-gray-600 hidden lg:block md:block">
            <h1 class="font-extrabold text-lg mb-3">Children Discount</h1>
            <p class="leading-5 text-sm">Children between the ages 3-9 receive 15% discount on the full face value of a ticket.</p>
            <p class="leading-5 text-sm">When filling out the passenger information section, change the ticket type from “Adult” to “Child 3 – 9” and the discount will be applied automatically to the purchase.</p>
            <p class="leading-5 text-sm">Children 3 years old or younger can travel free of charge if they will not be using his or her own seat.</p>
          </div>
          <div class="md:grid md:gap-8">
            <img class="m-auto" src="{{ asset('child-on-bus.jpg') }}"  alt="Children Discount" />
          </div>
          <div class="md:grid text-gray-600 lg:hidden md:hidden">
            <h1 class="font-extrabold text-lg mb-3">Children Discount</h1>
            <p class="leading-5 text-sm">Children between the ages 3-9 receive 15% discount on the full face value of a ticket.</p>
            <p class="leading-5 text-sm">When filling out the passenger information section, change the ticket type from “Adult” to “Child 3 – 9” and the discount will be applied automatically to the purchase.</p>
            <p class="leading-5 text-sm">Children 3 years old or younger can travel free of charge if they will not be using his or her own seat.</p>
          </div>

          <div class="md:grid md:gap-8">
            <img class="m-auto" src="{{ asset('Child-on-bus2.jpg') }}"  alt="Unaccompanied Minors" />
          </div>
          <div class="md:grid text-gray-600">
            <h1 class="font-extrabold text-lg mb-3">Unaccompanied Minors</h1>
            <p class="leading-5 text-sm">Any passenger under the age of 8 must be accompanied by a passenger at least 15 years of age or older at all times. Passengers between the ages of 8 and 14 years of age wishing to travel unaccompanied <u>must</u> pay a full adult fare <u>and</u> fill out the forms attached before traveling.</p>
            <p class="leading-5 text-sm text-red-600">
              <a href="{{ asset('Unaccompanied-Child-Forms-ilovepdf-compressed.pdf') }}" target="_blank">
                <span class="icon">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </span>
                <span  class="text">Consent Forms</span>
              </a>
            </p>
          </div>

          {{-- Pets --}}
          <div class="md:grid text-gray-600  xl:col-span-2 md:col-span-2 mt-10">
            <h1 class="font-extrabold text-2xl md:mb-3" id="pets">Pets</h1>
          </div>
          <div class="md:grid text-gray-600 hidden lg:block md:block">
            <h1 class="font-extrabold text-lg mb-3">Service Animals</h1>
            <p class="leading-5 text-sm">Fronteras Del Norte welcomes service animals on all buses and there are no additional charges for service animals traveling on board. These service animals are only allowed on board as long as they meet the ADA requirements and they have been declared at the time of purchasing the ticket. The service animal is the owner’s responsibility and must be under control using a leash or harness at all times. </p>
          </div>
          <div class="md:grid md:gap-8">
            <img class="m-auto" src="{{ asset('service-animal.jpg') }}"  alt="Service Animals" />
          </div>
          <div class="md:grid text-gray-600 lg:hidden md:hidden">
            <h1 class="font-extrabold text-lg mb-3">Service Animals</h1>
            <p class="leading-5 text-sm">Fronteras Del Norte welcomes service animals on all buses and there are no additional charges for service animals traveling on board. These service animals are only allowed on board as long as they meet the ADA requirements and they have been declared at the time of purchasing the ticket. The service animal is the owner’s responsibility and must be under control using a leash or harness at all times. </p>
          </div>


          <div class="md:grid md:gap-8">
            <img class="m-auto" src="{{ asset('dogs.jpg') }}"  alt="Pets" />
          </div>
          <div class="md:grid text-gray-600">
            <h1 class="font-extrabold text-lg mb-3">Pets</h1>
            <p class="leading-5 text-sm">Pets are also allowed to travel with Fronteras Del Norte but must be in a cage. It is at the discretion of the driver and all fellow passengers on board that an exception will be made for a pet that is in its cage to travel up on board the bus. If the exception is not made pets may ride with Fronteras Del Norte in our Luggage compartment. The pet is the owner’s responsibility and must be under control using a leash or harness and in its cage at all times.</p>
            <p class="leading-5 text-sm">Fronteras Del norte reserves the right to  remove the service animal or pet from the bus if it is aggressive or posses a threat to the health of other passengers or personnel.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-public-layout>