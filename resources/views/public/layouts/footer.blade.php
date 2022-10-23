<div class="footer mt-2">
  @if(Request::path() != 'travel/trip-seat')
  <div class="bg-custom-red lg:pb-12 lg:pt-16 lg:px-8 max-w-screen-full mx-auto pb-8 pt-12 px-4 relative sm:px-6 text-center text-white">
    <div class="-rotate-45 absolute bg-black bg-white h-5 left-0 m-auto right-0 transform triangle w-5" style="top: -7%;"></div>
    <div class="flex flex-wrap justify-center">
      <div class="mb-4">
        <span class="font-bold text-xl">Ready to Travel with Fronteras? </span>
      </div>
      <div class="mb-4">
        <a href="{{ route('web-user.login') }}" class="bg-custom-red border-b-2 border-red-700 hover:border-red-500 p-4 rounded ml-3 text-sm" id="book-trip-now">Book Trip Now!</a>
      </div>
    </div>
  </div>
  @endif
  <div class="max-w-screen-full mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 bg-primary">
    <div class="xl:grid xl:grid-cols-3 xl:gap-8">
      <div class="xl:col-span-1">
        <img class="" src="{{ asset('client-interface/white-logo.png') }}"  alt="Autobuses Fronteras Del Norte" />
      </div>
      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
        <div class="md:grid md:gap-8">
          <div>
            <h4 class="text-2xl leading-5 font-semibold tracking-wider text-white uppercase border-b pb-1.5">
              Contact 
            </h4>
            <ul class="mt-4">
              <li>
                <p class="text-sm text-red-500 font-semibold">Lost Angeles CA:</p>
                <p><a target="_blank" href="https://www.google.com/maps?q=2521+E+Florence+Ave+K9,+Huntington+Park,+CA+90255&um=1&ie=UTF-8&sa=X&ved=0ahUKEwi61e7q3KLgAhX0BjQIHad6CyAQ_AUIDigB" class="text-sm leading-6 text-white hover:opacity-60">
                  2521 E Florence Ave K9, Huntington Park, CA 90255
                </a></p>
                <p><a href="tel:3235875233" class="text-sm leading-6 text-white hover:opacity-60">
                  (323) 587-5233
                </a></p>
              </li>
              <li class="mt-1.5">
                <p class="text-sm text-red-500 font-semibold">Compton CA:</p>
                <p><a target="_blank" href="https://www.google.com/maps?q=15105+S+Atlantic+Ave,+Compton,+CA+90221&um=1&ie=UTF-8&sa=X&ved=0ahUKEwiZ3M653aLgAhWyMn0KHZEECTsQ_AUIDigB" class="text-sm leading-6 text-white hover:opacity-60">
                  15105 S Atlantic Ave, Compton, CA 90221
                </a></p>
                <p><a href="tel:3107637814" class="text-sm leading-6 text-white hover:opacity-60">
                  (310) 763-7814
                </a></p>
              </li>
              <li class="mt-1.5">
                <p class="text-sm text-red-500 font-semibold">San Diego/Tijuana: </p>
                <p><a target="_blank" href="https://www.google.com/maps/place/660+E+San+Ysidro+Blvd+B,+San+Diego,+CA+92173/@32.5464869,-117.0352089,17z/data=!3m1!4b1!4m5!3m4!1s0x80d9491d5b3cde5d:0xc0ace4d2d57fbfc3!8m2!3d32.5464869!4d-117.0330202" class="text-sm leading-6 text-white hover:opacity-60">
                  660 E San Ysidro Blvd # B, San Diego, CA 92173
                </a></p>
                <p><a href="tel:6194285116" class="text-sm leading-6 text-white hover:opacity-60">
                  (619) 428-5116
                </a></p>
              </li>
              <li class="mt-1.5">
                <p class="text-sm text-red-500 font-semibold">Washington: </p>
                <p><a target="_blank" href="https://www.google.com/maps/place/1408+E+Nob+Hill+Blvd,+Yakima,+WA+98901/@46.5848274,-120.4843847,17z/data=!3m1!4b1!4m5!3m4!1s0x5499d7b58053ae2f:0x3a6619e06ca227!8m2!3d46.5848274!4d-120.482196" class="text-sm leading-6 text-white hover:opacity-60">
                  1408 East Nob Hill Boulevard, Yakima, WA 98901
                </a></p>
                <p>
                    <span class="text-sm leading-6 text-white">
                        <a href="tel:8002302210" class="text-sm leading-6 text-white hover:opacity-60">
                        (800) 230-2210
                        </a>
                        /
                        <a href="tel:5095768741" class="text-sm leading-6 text-white hover:opacity-60">
                        (509) 576-8741
                        </a>
                    </span>
                </p>

                <p><a target="_blank" href="https://www.google.com/maps?q=110+N.+6th+St,+Sunnyside,+WA+98944&um=1&ie=UTF-8&sa=X&ved=0ahUKEwiDzKfs3aLgAhULFzQIHR17AdQQ_AUIDigB" class="text-sm leading-6 text-white hover:opacity-60">
                  110 N. 6th St, Sunnyside, WA 98944
                </a></p>
                <p>
                    <a href="tel:5095768741" class="text-sm leading-6 text-white hover:opacity-60">
                    (509) 576-8741
                    </a>
                </p>

                <p><a target="_blank" href="https://www.google.com/maps/place/205+S+4th+Ave,+Pasco,+WA+99301/@46.2291206,-119.0934251,17z/data=!3m1!4b1!4m5!3m4!1s0x54987ee75da64a41:0x43760fee5059c0a3!8m2!3d46.2291206!4d-119.0912364" class="text-sm leading-6 text-white hover:opacity-60">
                  205 S 4th Ave, Pasco, WA 99301
                </a></p>
                <p>
                    <a href="tel:5095456161" class="text-sm leading-6 text-white hover:opacity-60">
                    (509) 545-6161
                    </a>
                </p>
              </li>
              <li class="mt-1.5">
                <p class="text-sm text-red-500 font-semibold">Oregon: </p>
                <p><a target="_blank" href="https://www.google.com/maps?q=16100+SE+Stark+St+Portland,+OR+97233&um=1&ie=UTF-8&sa=X&ved=0ahUKEwigzZCN3qLgAhW1JzQIHbFHDMwQ_AUIDigB" class="text-sm leading-6 text-white hover:opacity-60">
                  16100 SE Stark St Portland, OR 97233
                </a></p>
                <p><a href="tel:3235875233" class="text-sm leading-6 text-white hover:opacity-60">
                  (323) 587-5233
                </a></p>
              </li>
              <li class="mt-1.5">
                <p class="text-sm text-red-500 font-semibold">Email: </p>
                <p><a href="mailto:info@travelfronteras.com" class="text-sm leading-6 text-white hover:opacity-60">
                  info@travelfronteras.com
                </a></p>
              </li>
              <li class="mt-1.5">
                <p class="text-sm text-red-500 font-semibold">Mailing Address: </p>
                <p><a target="_blank" href="https://www.google.com/maps/place/Fronteras+Del+Norte/@33.9748562,-118.2274678,19z/data=!4m5!3m4!1s0x80c2c93e788d5f37:0x52c92cc1b43bd468!8m2!3d33.9747814!4d-118.2267992" class="text-sm leading-6 text-white hover:opacity-60">
                  2521 Florence Ave
                  <br>
                  Huntington Park, CA 90255
                </a></p>
                <p><a target="_blank" href="https://www.google.com/maps?q=2521+E+Florence+Ave+K9,+Huntington+Park,+CA+90255&um=1&ie=UTF-8&sa=X&ved=0ahUKEwi61e7q3KLgAhX0BjQIHad6CyAQ_AUIDigB" class="text-sm leading-6 text-white hover:opacity-60">
                  2521 E Florence Ave K9
                  <br>
                  Huntington Park, CA 90255
                </a></p>
              </li>
            </ul>
          </div>
        </div>
        <div class="md:grid md:gap-8">
          <div>
            <h4 class="text-2xl leading-5 font-semibold tracking-wider text-white uppercase border-b pb-1.5">
              Explore
            </h4>
            <ul class="mt-4">
              <li>
                <a href="{{ route('web-user.login') }}" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Book Trip
                </a>
              </li>
              <li class="mt-1.5">
                <a href="{{ route('web.about-us') }}" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  About Us
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Terminals
                </a>
              </li>
              <li class="mt-1.5">
                <a href="{{ route('web.travel-information') }}" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Travel Information
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  FAQ
                </a>
              </li>
              <li class="mt-1.5">
                <a href="{{ route('web.contact-us') }}" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Contact Us
                </a>
              </li>
              <li class="mt-1.5">
                <a href="{{ route('web.careers') }}" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Careers
                </a>
              </li>
              <li class="mt-1.5">
                <a href="{{ route('web.privacy-policy') }}" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Privacy Policy
                </a>
              </li>
             {{--  <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  LAX Bus Travel
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Compton to LAX
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Huntington Part to LAX
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Interstate 5 Buses
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Tijuana to Yakima
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Solemn to Tijuana
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Route 97 Buses
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                 Sitemap
                </a>
              </li>
              <li class="mt-1.5">
                <a href="#" class="text-sm leading-6 text-white font-bold hover:opacity-60">
                  Cities
                </a>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-8 border-t border-white pt-8 md:flex md:items-center md:justify-between">
      <div class="flex md:order-2">
        <a href="https://www.facebook.com/TravelFronteras/" target="_blank" class="text-white hover:text-red-500">
          <span class="sr-only">Facebook</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
          </svg>
        </a>
        <a href="https://www.instagram.com/travelfronteras/" target="_blank" class="ml-6 text-white hover:text-red-500">
          <span class="sr-only">Instagram</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
          </svg>
        </a>
      </div>
      <p class="mt-8 text-base leading-6 text-white md:mt-0 md:order-1">
        2020 Fronteras Del Norte
      </p>
    </div>
  </div>
</div>