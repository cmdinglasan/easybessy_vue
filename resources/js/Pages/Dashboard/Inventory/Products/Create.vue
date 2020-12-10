<template>
	<div class="h-screen w-screen bg-white flex justify-items-center items-center">
		<div class="flex-auto">
			<div class="w-full mx-auto p-4 rounded-xl" style="max-width: 700px">
				<!-- Steps Counter -->
				<div class="border border-gray-200 rounded-md p-4 mb-4">
					<div class="flex justify-between items-center">
						<h5 class="font-bold">
							Step {{ step }} of 2
						</h5>
						<div class="font-bold">
							<button type="button" class="transition-all p-2 border-0 rounded-md hover:bg-gray-200 focus:outline-none" :class="step == 1 ? 'opacity-100 font-bold' : 'opacity-25'" @click="step = 1">Product Name</button>
							<button type="button" class="transition-all p-2 border-0 rounded-md hover:bg-gray-200 focus:outline-none" :class="step == 2 ? 'opacity-100 font-bold' : 'opacity-25'" @click="step = 2">Product Details</button>
						</div>
					</div>
				</div>

				<!-- Steps Content -->
				<form action="" method="POST">
					@csrf
					<div class="steps-content p-4">
						<div v-show="step == 1">
							<h3 class="font-bold mb-4 text-2xl">
								What's the products called?
							</h3>
							<input type="text" class="p-3 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name" />
						</div>
						<div v-show="step == 2">
							<h3 class="font-bold mb-4 text-2xl">
								Product Details
							</h3>
							<div class="mt-4">
								<label for="category" class="font-bold mb-4 block">Category</label>
								<select id="category" name="category" class="p-3 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors">
									<option value="">Test</option>
								</select>
							</div>
							<div class="mt-4">
								<label for="price" class="font-bold mb-4 block">Price</label>
								<input type="text" id="price" class="p-3 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Price" />
							</div>
						</div>
					</div>
				</form>

				<!-- Steps Navigation -->
				<div class="p-4 mt-4">
					<div class="flex justify-between">
						<button type="button" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" @click="step--" v-if="step > 1">
							< Back
						</button>
						<button type="button" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" @click="step++" v-if="step < 2">
							Next >
						</button>
						<button type="button" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" @click="createModal = false" v-if="step == 2">
							Add
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
        props: ['on', 'createModal'],
        data() {
        	return {
        		step: 1,
        	}
		},
    }	
</script>