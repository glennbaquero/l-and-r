<x-public-layout>
	<public-reservation
		trip-time-url="{{ route('web.ticket.get-trip-time') }}"
		get-bus-url="{{ route('web.ticket.fetch-bus') }}"
		payment-url="{{ route('web.ticket.payment') }}"
		voucher-validate-url="{{ route('web.ticket.voucher-validate') }}"
		:years="{{ $years }}"
		:ticket-types="{{ $ticket_types }}"
		:saved-payload="{{ $saved_payload }}"
	></public-reservation>
</x-public-layout>