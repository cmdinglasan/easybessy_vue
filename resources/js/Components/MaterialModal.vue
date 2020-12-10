<template>
	<div class="fixed h-screen p-4 w-full md:w-1/2 lg:w-1/4 top-0 bg-blue-500 transition-all duration-200" :class="active == true ? 'right-0' : '-right-full'">
		<div class="container mx-auto relative py-4">
			<div class="action-bar">
				<button class="h-10 w-10 text-white py-2" @click="changeActive">
					<i class="material-icons">arrow_back</i>
				</button>
			</div>
			<div class="p-4">
				<div class="photo h-64 overflow-hidden">
					<img src="https://via.placeholder.com/100.png?text=Image" class="w-full mx-auto"/>
				</div>
				<div class="name my-4">
					<h2 class="font-bold text-white text-xl">
						{{ productName }}
					</h2>
				</div>
			</div>
		</div>
		
	</div>
</template>

<script>
	export default {
		props: ['active', 'name', 'productName'],
		methods: {
			changeActive() {
				this.$emit('changeUsername');
				console.log(this.$emit('changeUsername'));
			}
		}
	}
</script>