<x-public-layout>
  <div class="bg-white">
    <div class="max-w-screen-xl mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8">
      <p class="mt-1 text-4xl leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">Terminals</p>
    </div>
  </div>

  <div class="find-terminal-container relative bg-white">
    <div style="background-image: url({{asset('Hp-Terminal-.jpg')}})" class="bg-cover bg-no-repeat bg-top">
      <div style="padding-top: calc(100vw * 0.35);">
      </div>
    </div>
    <div class="bg-white left-0 m-auto p-16 relative right-0 w-5/6">
      <h1 class="font-extrabold text-4xl text-center text-white">Find a Terminal Near You</h1>
    </div>
    <div class="bg-white left-0 m-auto p-20 right-0 w-5/6 absolute" style="top: calc(100vw * 0.30);">
      <h1 class="font-extrabold text-4xl text-center text-gray-800">Find a Terminal Near You</h1>
      <div class="bg-black h-0.5 w-0 animate-line m-auto mt-3"></div>
    </div>
  </div>


  <terminal-map-section 
    :terminals="{{ $terminals }}"
  ></terminal-map-section>

  <div class="bg-white">
    <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-2">
        <div class="col-span-1">
          <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 bg-white">
            <h1 class="font-extrabold text-4xl text-center text-gray-800">Terminals</h1>
            <div class="bg-black h-0.5 w-0 animate-line m-auto mt-3"></div>
            @foreach($terminals as $terminal)
            <div class="grid grid-cols-3 gap-8 mt-5">
              <div class="bg-red-500 h-80">
                <google-map  :origin="{{ json_encode($terminal->departure ?? $terminal)  }}" :destination="{{ json_encode($terminal->departure ?? $terminal)  }}" v-slot="{ directionsURL, hasOrigin }">
                    <iframe  style="height: 100%; width: 100%" id="map" :src="directionsURL" frameborder="0"></iframe>
                </google-map>
              </div>
              <div class="h-80">
                <div style="padding-top: calc(100vw * 0.09);">
                  <h1 class="font-extrabold text-2xl">{{ $terminal->departure ? $terminal->departure->name : $terminal->name }} {{ $terminal->departure ? $terminal->departure->state : $terminal->state }}</h1>
                  <p class="text-sm">{{ $terminal->departure ? $terminal->departure->address_line_1 : $terminal->address_line_1 }}</p>
                  <p class="leading-5 text-sm text-red-600">
                    <a href="#">
                      <span class="icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                      </span>
                      <a  href="tel:{{ $terminal->phone_number }}" class="text">{{ $terminal->phone_number }}</a>
                    </a>
                  </p>
                </div>
              </div>
              <div class="flex h-80 relative">
                <a href="https://www.google.com/maps/dir/{{ $terminal->departure ? $terminal->departure->latitude : $terminal->latitude }}, {{ $terminal->departure ? $terminal->departure->longitude : $terminal->longitude }}" target="_blank" class=" bg-red-500 bottom-0 font-bold h-1/5 left-0 mx-auto my-auto p-5 right-0 rounded text-center text-white top-0 ">Get Directions</a>
              </div>
            </div>
            @endforeach
            {{-- <div class="grid grid-cols-3 gap-8 mt-5">
              <div class="bg-red-500 h-80"></div>
              <div class="h-80">
                <div style="padding-top: calc(100vw * 0.09);">
                  <h1 class="font-extrabold text-2xl">Los Angeles Ca.</h1>
                  <p class="text-sm">2521 E Florence Ave K9, Huntington Park, CA 90255</p>
                  <p class="leading-5 text-sm text-red-600">
                    <a href="#">
                      <span class="icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                      </span>
                      <span class="text">(323) 587-5233</span>
                    </a>
                  </p>
                </div>
              </div>
              <div class="h-80 relative">
                <button type="button" class="absolute active:bg-red-800 active:shadow-lg bg-red-600 bottom-0 duration-150 ease-in-out focus:bg-red-700 focus:outline-none focus:ring-0 focus:shadow-lg font-medium h-14 hover:bg-red-700 hover:shadow-lg leading-tight left-0 m-auto px-6 py-2.5 right-0 rounded text-center text-white top-0 transition uppercase w-max">Get Directions</button>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="col-span-1">
          <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 bg-white">
            <h1 class="font-extrabold text-4xl text-center text-gray-800">Agencies</h1>
            <div class="bg-black h-0.5 w-0 animate-line m-auto mt-3"></div>
            @foreach($agencies as $agency)
            <div class="grid grid-cols-3 gap-8 mt-5">
              <div class="bg-red-500 h-80">
                <google-map  :origin="{{ json_encode($agency->departure ?? $agency)  }}" :destination="{{ json_encode($agency->departure ?? $agency)  }}" v-slot="{ directionsURL, hasOrigin }">
                    <iframe  style="height: 100%; width: 100%" id="map" :src="directionsURL" frameborder="0"></iframe>
                </google-map>
              </div>
              <div class="h-80">
                <div style="padding-top: calc(100vw * 0.09);">
                  <h1 class="font-extrabold text-2xl">{{ $agency->departure ? $agency->departure->name : $agency->name }} {{ $agency->departure ? $agency->departure->state : $agency->state }}</h1>
                  <p class="text-sm">{{ $agency->departure ? $agency->departure->address_line_1 : $agency->address_line_1 }}</p>
                  <p class="leading-5 text-sm text-red-600">
                    <a href="#">
                      <span class="icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                      </span>
                      <a  href="tel:{{ $agency->phone_number }}" class="text">{{ $agency->phone_number }}</a>
                    </a>
                  </p>
                </div>
              </div>
              <div class="flex h-80 relative">
                <a href="https://www.google.com/maps/dir/{{ $agency->departure ? $agency->departure->latitude : $agency->latitude }}, {{ $agency->departure ? $agency->departure->longitude : $agency->longitude }}" target="_blank" class=" bg-red-500 bottom-0 font-bold h-1/5 left-0 mx-auto my-auto p-5 right-0 rounded text-center text-white top-0 ">Get Directions</a>
              </div>
            </div>
            @endforeach
            {{-- <div class="grid grid-cols-3 gap-8 mt-5">
              <div class="bg-red-500 h-80"></div>
              <div class="h-80">
                <div style="padding-top: calc(100vw * 0.09);">
                  <h1 class="font-extrabold text-2xl">Los Angeles Ca.</h1>
                  <p class="text-sm">2521 E Florence Ave K9, Huntington Park, CA 90255</p>
                  <p class="leading-5 text-sm text-red-600">
                    <a href="#">
                      <span class="icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                      </span>
                      <span class="text">(323) 587-5233</span>
                    </a>
                  </p>
                </div>
              </div>
              <div class="h-80 relative">
                <button type="button" class="absolute active:bg-red-800 active:shadow-lg bg-red-600 bottom-0 duration-150 ease-in-out focus:bg-red-700 focus:outline-none focus:ring-0 focus:shadow-lg font-medium h-14 hover:bg-red-700 hover:shadow-lg leading-tight left-0 m-auto px-6 py-2.5 right-0 rounded text-center text-white top-0 transition uppercase w-max">Get Directions</button>
              </div>
            </div> --}}
          </div>
        </div>
    </div>
    
  </div>

</x-public-layout>