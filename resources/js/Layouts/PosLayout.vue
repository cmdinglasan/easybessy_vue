<template>
	<div class="min-h-screen bg-white">
		<pos-sidebar></pos-sidebar>

		<div class="ml-64">
			<div class="mx-auto">
				
				<slot name="content"/>

			</div>
		</div>

	</div>
</template>

<script>
	import PosSidebar from '@/Components/POSSidebar'

	export default {
        components: {
        	PosSidebar,
        },
    }
</script>