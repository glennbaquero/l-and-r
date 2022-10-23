<x-public-layout>
  <div class="bg-white">
    <div class="max-w-screen-xl mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8">
      <p class="mt-1 text-4xl leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">FAQ</p>
    </div>
  </div>

  <div class="bg-white">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 bg-white">
      <div class="grid grid-cols-3 gap-8 mt-5">
        <div class="col-span-3 lg:col-span-2 lg:px-8 max-w-screen-xl mx-auto px-4 sm:px-6">
          @if(count($faqs['departures']))
            <div class="max-w-3xl mx-auto">
              <h2 class="text-3xl leading-9 font-extrabold text-gray-600 sm:text-4xl sm:leading-10">
                Departures
              </h2>
              <div class="mt-6 border-t-2 border-gray-200 pt-6">
                <dl>
                  @foreach($faqs['departures'] as $key => $faq_departure)
                    @if($key === 0)
                      <toggle v-slot="{ display, toggled }">
                        <div>
                          <dt class="text-lg leading-7">
                            <button class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-600" @click="toggled">
                              <span class="font-bold text-gray-600">
                                {{ $faq_departure->title }}
                              </span>
                              <span class="ml-6 h-7 flex items-center">
                                <svg class="h-6 w-6 transform -rotate-180" stroke="currentColor" fill="none" viewBox="0 0 24 24" v-if="!display">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>

                                <svg v-if="display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                              </span>

                            </button>
                          </dt>
                          <dd class="mt-2 pr-12"  v-if="display">
                            <p class="text-base leading-6 text-gray-500">
                              {{ $faq_departure->content }}
                            </p>
                          </dd>
                        </div>
                      </toggle>
                    @endif
                    @if($key > 0)
                      <div class="{{ ($key+1) === count($faqs['departures']) ? 'border-b pb-6' : '' }} mt-6 border-t border-gray-200 pt-6">
                        <toggle v-slot="{ display, toggled }">
                          <div>
                            <dt class="text-lg leading-7">
                              <button class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-600" @click="toggled">
                                <span class="font-bold text-gray-600">
                                  {{ $faq_departure->title }}
                                </span>
                                <span class="ml-6 h-7 flex items-center">
                                  <svg class="h-6 w-6 transform -rotate-180" stroke="currentColor" fill="none" viewBox="0 0 24 24" v-if="!display">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                  </svg>

                                  <svg v-if="display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </span>
                              </button>
                            </dt>
                            <dd class="mt-2 pr-12"  v-if="display">
                              <p class="text-base leading-6 text-gray-500">
                                  {{ $faq_departure->content }}
                              </p>
                            </dd>
                          </div>
                        </toggle>
                      </div>
                    @endif
                  @endforeach
                </dl>
              </div>
            </div>
          @endif

          @if(count($faqs['pricing']))
          <div class="max-w-3xl mx-auto py-16 sm:py-20">
            <h2 class="text-3xl leading-9 font-extrabold text-gray-600 sm:text-4xl sm:leading-10">
              Pricing
            </h2>
            <div class="mt-6 border-t-2 border-gray-200 pt-6">
              <dl>
                @foreach($faqs['pricing'] as $key => $faq_pricing)
                    @if($key === 0)
                      <toggle v-slot="{ display, toggled }">
                        <div>
                          <dt class="text-lg leading-7">
                            <button class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-600" @click="toggled">
                              <span class="font-bold text-gray-600">
                                {{ $faq_pricing->title }}
                              </span>
                              <span class="ml-6 h-7 flex items-center">
                                  <svg class="h-6 w-6 transform -rotate-180" stroke="currentColor" fill="none" viewBox="0 0 24 24" v-if="!display">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                  </svg>

                                  <svg v-if="display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                              </span>
                            </button>
                          </dt>
                          <dd class="mt-2 pr-12" v-if="display">
                            <p class="text-base leading-6 text-gray-500">
                              {{ $faq_pricing->content }}
                            </p>
                          </dd>
                        </div>
                      </toggle>
                  @endif
                @endforeach
                @if($key > 0)
                  <div class="{{ ($key+1) === count($faqs['departures']) ? 'border-b pb-6' : '' }} mt-6 border-t border-gray-200 pt-6">
                    <toggle v-slot="{ display, toggled }">
                      <div>
                        <dt class="text-lg leading-7">
                          <button class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-600" @click="toggled">
                            <span class="font-bold text-gray-600">
                              {{ $faq_pricing->title }}
                            </span>
                            <span class="ml-6 h-7 flex items-center">
                              <svg class="h-6 w-6 transform -rotate-180" stroke="currentColor" fill="none" viewBox="0 0 24 24" v-if="!display">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                              </svg>

                              <svg v-if="display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                          </button>
                        </dt>
                        <dd class="mt-2 pr-12 " v-if="display">
                            <p class="text-base leading-6 text-gray-500">
                              {{ $faq_pricing->content }}
                            </p>
                        </dd>
                      </div>
                    </toggle>
                  </div>
                @endif
              </dl>
            </div>
            <p class="text-base text-gray-500 mt-4">Senior and Children Pricing Differ*</p>
          </div>
          @endif

          @if(count($faqs['others']))
            <div class="max-w-3xl mx-auto">
              <h2 class="text-3xl leading-9 font-extrabold text-gray-600 sm:text-4xl sm:leading-10">
                Other
              </h2>
              <div class="mt-6 border-t-2 border-gray-200 pt-6">

                <dl>
                  @foreach($faqs['others'] as $key => $faq_other)
                    @if($key === 0)
                      <toggle v-slot="{ display, toggled }">
                        <div>
                          <dt class="text-lg leading-7">
                            <button class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-600" @click="toggled">
                              <span class="font-bold text-gray-600">
                                {{ $faq_other->title }}
                              </span>
                              <span class="ml-6 h-7 flex items-center">
                                  <svg class="h-6 w-6 transform -rotate-180" stroke="currentColor" fill="none" viewBox="0 0 24 24" v-if="!display">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                  </svg>

                                  <svg v-if="display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                              </span>
                            </button>
                          </dt>
                          <dd class="mt-2 pr-12" v-if="display">
                            <p class="text-base leading-6 text-gray-500">
                              {{ $faq_other->content }}
                            </p>
                          </dd>
                        </div>
                      </toggle>
                    @endif

                    @if($key > 0)
                      <div class=" {{ ($key+1) === count($faqs['others']) ? 'border-b pb-6' : '' }} mt-6 border-t border-gray-200 pt-6">
                        <toggle v-slot="{ display, toggled }">
                          <div>
                            <dt class="text-lg leading-7">
                              <button class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-600" @click="toggled">
                                <span class="font-bold text-gray-600">
                                  {{ $faq_other->title }}
                                </span>
                                <span class="ml-6 h-7 flex items-center">
                                  <svg class="h-6 w-6 transform -rotate-180" stroke="currentColor" fill="none" viewBox="0 0 24 24" v-if="!display">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                  </svg>

                                  <svg v-if="display" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </span>
                              </button>
                            </dt>
                            <dd class="mt-2 pr-12" v-if="display">
                              <p class="text-base leading-6 text-gray-500">{{ $faq_other->content }}</p>
                            </dd>
                          </div>
                        </toggle>
                      </div>
                    @endif
                  @endforeach
                </dl>
              </div>
            </div>
          @endif
        </div>
        <div class="col-span-3 lg:col-span-1 lg:px-8 max-w-screen-xl px-4 sm:px-6">
          <div class="flex flex-col sticky top-20">
            <h1 class="font-bold text-2xl text-gray-600">Still Have Questions?</h1>
            <p class="mt-2 text-sm">Get in touch and we will be sure to answer them in a timely manner!</p>
            <a href="{{ route('web.contact-us') }}" class="bg-red-500 hover:shadow-2xl mt-2 p-3 rounded text-white w-max">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-public-layout>