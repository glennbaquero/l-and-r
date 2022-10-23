<x-public-layout>
	<div class="mt-12 mx-auto xl:w-8/12">
		<user-reservation-list
			ticket-fetch-url="{{ route('web.ticket.fetch') }}"
	  		send-payload-url="{{ route('web.save-payload') }}"
		></user-reservation-list>
	</div>
</x-public-layout>