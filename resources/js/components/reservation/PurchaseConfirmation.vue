<template>
	<iframe :src="ticket_info" class="w-full h-screen" id="pdf_viewer"></iframe>
</template>

<script type="text/javascript">
	export default {
		data() {
			return {
				ticket_info: this.$parent.success_data.print_route,
			}
		}
	}
</script>