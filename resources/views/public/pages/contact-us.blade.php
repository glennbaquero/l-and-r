<x-public-layout>
  <div class="grid grid-cols-1 gap-0 xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-1">
    <div class="col-span-1 sm:block xl:hidden lg:hidden md:hidden xs:block">
      <p class="mt-1 text-4xl leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">Contact Us</p>
    </div>
    <div class="col-span-1">
          <google-map  :origin="{{ json_encode($default_address)  }}" :destination="{{ json_encode($default_address)  }}" v-slot="{ directionsURL, hasOrigin }">
              <iframe  style="height: 100%; width: 100%" id="map" :src="directionsURL" frameborder="0"></iframe>
          </google-map>
    </div>
    <div class="col-span-1">
      <form action="{{ route('web.contact-us.store') }}" method="POST">
        @csrf
        <div class="gap-2 grid grid-cols-2 p-12 xl:p-20">
          <div class="col-span-full">
            <h6 class="font-bold text-2xl">Contact.</h6>
          </div>
          <div class="col-span-full">
            <p class="text-sm">
              Before contacting us please visit our very thorough Frequently Asked Questions Page to see if we can answer your questions right now!!
            </p>
            <p class="text-sm mt-2">
               You can also contact us by emailing <a href="mailto:info@travelfronteras.com" class="text-red-500">info@travelfronteras.com</a> or calling our support number at <a href="tel:3235875233" class="text-red-500">(323) 587-5233</a>
            </p>
          </div>

          <div class="col-span-full">
            <p class="text-sm">
              Fields marked with an <span class="text-red-500">*</span> are required
            </p>
          </div>
          <div class="col-span-full">
            @if(Session::has('success'))
                <x-alert hasclass="none" message="{{ Session::get('success') }}" />
            @elseif(Session::has('errors'))
                <x-alert hasclass="none" message="Error encountered" type="error" >
                    @if ($errors->any())
                        <ul class="list-inside list-disc text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </x-alert>
            @endif
          </div>
          <div class="col-span-full">
            <label class="font-bold text-sm">Name <span class="text-red-500">*</span></label>
            <input type="text"  required name="name" class="bg-gray-200 border-transparent duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto px-3 py-2 rounded shadow-sm transition w-full">
          </div>
          <div class="col-span-1">
            <label class="font-bold text-sm">Email <span class="text-red-500">*</span></label>
            <input type="email"  required name="email" class="bg-gray-200 border-transparent duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto px-3 py-2 rounded shadow-sm transition w-full">
          </div>
          <div class="col-span-1">
            <label class="font-bold text-sm">Phone Number <span class="text-red-500">*</span></label>
            <input type="text" name="phone_number" class="bg-gray-200 border-transparent duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto px-3 py-2 rounded shadow-sm transition w-full">
          </div>
          <div class="col-span-full">
            <label class="font-bold text-sm">Message <span class="text-red-500">*</span></label>
            <textarea required name="message" class="bg-gray-200 border-transparent duration-150 ease-in-out focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input leading-none mx-auto px-3 py-2 rounded shadow-sm transition w-full" cols="5" rows="10"></textarea>
          </div>
          <div class="col-span-1">
            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-red-600 focus:outline-none focus:border-red-300 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5 w-36 font-bold">
                Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</x-public-layout>
