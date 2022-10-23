<nav class="bg-red-500">
    <div class="md:flex md:items-right mx-auto p-2 px-4">
        <div class="flex-col hidden md:flex md:flex-row md:ml-auto" id="navbar-collapse">
            <a href="tel:3235875233" class="duration-300 p-2 rounded text-white text-xs transition-colors">(323) 587-5233</a>
            <a href="mailto:info@travelfronteras.com" class="duration-300 p-2 rounded text-white text-xs transition-colors">info@travelfronteras.com</a>
            <a href="#" class="duration-300 p-2 rounded text-white text-xs transition-colors">English</a>
            <a href="#" class="duration-300 p-2 rounded text-white text-xs transition-colors">Espanol</a>
        </div>
    </div>
</nav>
<nav class="bg-lightblue py-2 md:py-4">
    <toggle v-slot="{ display, toggled }">
        <div class="px-4 mx-auto md:flex md:items-right">

            <div class="flex justify-between items-right">
                <a href="/travel/" class="font-bold text-xl text-indigo-600">
                    <img src="{{ asset('client-interface/white-logo.png') }}" class="w-80">
                </a>
                <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle" @click="toggled">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>

            {{-- Desktop --}}
            <div class="flex-col hidden md:flex md:flex-row md:ml-auto md:mr-0 md:mt-0 mt-3 p-4">
                <a href="{{ route('web.about-us') }}" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">ABOUT US</a>
                <a href="{{ route('web.travel-information') }}" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">TRAVEL INFORMATION</a>
                <a href="{{ route('web.terminals') }}" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">TERMINALS</a>
                <a href="{{ route('web.faq') }}" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">FAQ</a>
                <a href="{{ route('web.contact-us') }}" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">CONTACT US</a>
                <a href="{{ route('web.covid-19') }}" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">COVID-19</a>
                <a href="{{ auth()->guard('web_user')->user() ? '/travel/trip-seat' : '/travel/login' }}" class="bg-red-500 duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-white text-xs transition-colors">Book Trip</a>
                
                @if(auth()->guard('web_user')->user())
                    <div class="flex justify-center">
                        <div>
                            <sidebar-action v-slot="{ open, updateOpen }">
                                <div class="dropdown relative">
                                    <button class="duration-150 ease-in-out flex font-medium leading-tight px-6 py-2.5 text-white text-xs transition uppercase whitespace-nowrap " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" @click="updateOpen">
                                        Hi, {{ auth()->guard('web_user')->user()->first_name }}
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                            <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                        </svg>
                                    </button>
                                    <ul class=" absolute bg-clip-padding bg-white border-none float-left list-none m-0 min-w-max mt-1 py-2 shadow-lg text-base text-left w-auto z-50" aria-labelledby="dropdownMenuButton1" :class="open ? '' : 'hidden'" style="right: 5px;">
                                        <li>
                                            <a href="{{ route('web.dashboard') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">My recent trip</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('travel.logout') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </sidebar-action>
                        </div>
                    </div>
                @else
                    <a href="/travel/login" class="duration-300 font-bold lg:px-4 md:mx-2 p-2 rounded text-xs text-white transition-colors">Login</a>
                @endif
            </div>


            {{-- Mobile --}}
            <div class="absolute z-20 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" v-if="display">
              <div class="rounded-lg shadow-md bg-lightblue ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="px-5 pt-4 flex items-center justify-between">
                  <div>
                  </div>
                  <div class="-mr-2">
                    <button type="button" class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="toggled">
                      <span class="sr-only">Close main menu</span>
                      <!-- Heroicon name: outline/x -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('web.about-us') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">ABOUT US</a>
                    <a href="{{ route('web.travel-information') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">TRAVEL INFORMATION</a>
                    <a href="{{ route('web.terminals') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">TERMINALS</a>
                    <a href="{{ route('web.faq') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">FAQ</a>
                    <a href="{{ route('web.contact-us') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">CONTACT US</a>
                    <a href="{{ route('web.covid-19') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">COVID-19</a>
                    <a href="{{ auth()->guard('web_user')->user() ? '/travel/trip-seat' : '/travel/login' }}" class="bg-red-500 font-bold lg:px-4 md:mx-2 p-2 rounded block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-gray-50">Book Trip</a>
                    @if(auth()->guard('web_user')->user())
                    <div class="">
                        <div>
                            <sidebar-action v-slot="{ open, updateOpen }">
                                <div class="dropdown ">
                                    <button class="duration-150 ease-in-out flex font-medium leading-tight px-6 py-2.5 text-white text-xs transition uppercase whitespace-nowrap  " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" @click="updateOpen">
                                        Hi, {{ auth()->guard('web_user')->user()->first_name }}
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                            <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                        </svg>
                                    </button>
                                    <ul class=" bg-clip-padding bg-white border-none list-none m-0 min-w-max mt-1 py-2 shadow-lg text-base text-left w-auto z-50" aria-labelledby="dropdownMenuButton1" :class="open ? '' : 'hidden'" style="right: 5px;">
                                        <li>
                                            <a href="{{ route('web.dashboard') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">My recent trip</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('travel.logout') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </sidebar-action>
                        </div>
                    </div>
                @else
                    <a href="/travel/login" class="block w-full px-5 py-3 font-medium text-white hover:bg-gray-100 rounded"> Log in </a>
                @endif
                </div>
              </div>
            </div>
          </div>
    </toggle>
</nav>