<x-public-layout>
  <div class="bg-white">
    <div class="max-w-screen-xl mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8">
      <p class="mt-1 text-4xl leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">Careers</p>
    </div>
  </div>

  <div style="background-image: url({{asset('bus-sunset.jpg')}})" class="bg-cover bg-no-repeat bg-top">
    <div class="mx-auto py-40 px-4 sm:py-40 sm:px-6 lg:px-8 bg-blue-opacity-80">
      <div class="text-center">
        <h1 class="mt-1 text-4xl leading-10 font-extrabold text-white sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">
          <span>Careers</span>
        </h1>
      </div>
    </div>
  </div>

  <div class="bg-white">
    <form action="{{ route('web.careers.store') }}" method="POST">
      @csrf

      <div class="max-w-screen-xl mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8">

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

        <h1 class="font-bold mb-2 text-2xl">Apply for a Position</h1>
        <p class="mb-2 text-sm">Fields marked with an <span class="text-red-500">*</span> are required</p>
        <div class="-mx-3 flex flex-wrap mt-12">
          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              First Name *
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white  @error('first_name') border-red-500 @enderror" id="grid-first-name" type="text" name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
              <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
          </div>

          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Last Name *
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('last_name') border-red-500 @enderror" id="grid-last-name" type="text" name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
              <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
          </div>

          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
              Email *
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white  @error('email') border-red-500 @enderror" id="grid-email" type="email" name="email" value="{{ old('email') }}" required>
             @error('email')
              <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
          </div>

          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
              Phone
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('phone_number') border-red-500 @enderror" id="grid-phone" type="text" name="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number')
              <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
          </div>

          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-position" >
              Select a Position *
            </label>
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="grid-position" name="position" value="{{ old('position') }}" required>
              <option value="Dispatcher/Cashier">Dispatcher/Cashier</option>
              <option value="Driver">Driver</option>
              <option value="Coordinator">Coordinator</option>
              <option value="Maintenance Team<">Maintenance Team</option>
              <option value="Terminal Manager">Terminal Manager</option>
            </select>
          </div>

          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-comments">
              Additional Comments
            </label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('additional_comments') border-red-500 @enderror" id="grid-comments" type="text" rows="8" name="additional_comments"> {{ old('additional_comments') }} </textarea>
          </div>
        </div>

        <button type="submit" class="bg-red-500 font-bold hover:bg-blue-600 hover:bg-blue-900 px-4 py-2 rounded text-white">
          Submit
        </button>

        <div class="mt-10 text-sm">
          @if(Session::has('errors'))
            <p class="text-red-600">Please correct errors before submitting this form.</p>
          @endif
          <p><span class="text-gray-600">*Resumes can be submitted to</span> <a href="mailto:joel.lopez414@yahoo.com" class="hover:underline text-red-600">joel.lopez414@yahoo.com</a></p>
        </div>
      </div>
    </form>
  </div>
</x-public-layout>