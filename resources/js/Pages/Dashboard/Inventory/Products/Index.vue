<template>
	<dash-layout>

		<!-- Header -->
		<template #header>
			Products
		</template>

		<template #actions>
			<button type="button" class="px-4 py-2 ml-4 h-10 bg-white hover:bg-gray-100 text-blue-500 font-bold rounded-md outline-none focus:outline-none transition-all text-sm" @click="createModal = true">
				<div class="flex items-center">
					<i class="material-icons">add</i>
					<span class="ml-2 mt-1">Add</span>
				</div>
			</button>
		</template>

		<template #tabs>
			<div class="flex">
				<button type="button" class="py-2 px-4 h-12 leading-8 border-b-4 rounded-none outline-none focus:outline-none transition-all" @click="itemView = 'grid'" :class="itemView == 'grid' ? 'border-white' : 'border-transparent' ">
					<span class="font-medium">Overview</span>
				</button>
				<button type="button" class="py-2 px-4 h-12 leading-8 border-b-4 rounded-none outline-none focus:outline-none transition-all" @click="itemView = 'list'" :class="itemView == 'list' ? 'border-white' : 'border-transparent' ">
					<span class="font-medium">Categories</span>
				</button>
			</div>
		</template>

		<template #content>

			<div class="relative">
				<transition name="cards">
					<div class="relative" v-if="itemView == 'list'">
						<div class="mb-6" v-for="category in categories" :key="category.id">
							<div class="mb-4">
								<h3 class="font-bold text-2xl capitalize">{{ category.name }}</h3>
							</div>
							<div class="grid md:grid-flow-col grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 auto-rows-auto gap-4 w-full">
								<div class="rounded-md bg-white overflow-hidden relative transition-all transform" v-for="product in products" v-if="product.category_id == category.id" :key="product.id">
									<div class="image h-32 overflow-hidden">
										<img src="https://via.placeholder.com/100.png?text=Image" class="w-full mx-auto"/>
									</div>
									<div class="details p-6 flex flex-col pb-20">
										<div class="row flex-auto">
											<h4 class="text-gray-600 font-bold text-lg">{{ product.name }}</h4>
										</div>
										<div class="row">
											<h4 class="text-gray-600 font-bold text-sm" v-for="category in categories" v-if="category.id == product.category_id">{{ category.name }}</h4>
										</div>
										<div class="row">
											<h4 class="text-gray-600 font-bold text-sm">Php {{ product.price }}</h4>
										</div>
										<div class="absolute bottom-0 left-0 w-full flex gap-2 px-6 py-4">
											<inertia-link :href="'/dashboard/products/' + product.id" class="flex-auto py-1 h-10 text-center flex-1 focus:outline-none hover:bg-gray-100 rounded-md border-gray-300 border" @click.prevent="showProduct(product.name)">
												<span class="text-blue-500 font-bold leading-8 text-sm">View</span>
											</inertia-link>
											<button type="button" class="py-1 h-10 w-10 text-center focus:outline-none hover:bg-blue-600 rounded-md border-blue-300 bg-blue-500">
												<i class="material-icons leading-7 text-sm text-white">edit</i>
											</button>
											<button type="button" class="py-1 h-10 w-10 text-center focus:outline-none hover:bg-red-600 rounded-md border-red-300 bg-red-500">
												<i class="material-icons leading-7 text-sm text-white">delete</i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</transition>

				<transition name="cards">
					<div class="transition-all duration-500" v-if="itemView == 'grid'">
						<div class="grid md:grid-flow-col grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 auto-rows-auto gap-4 w-full">
							<div class="hover:shadow-xl rounded-md bg-white overflow-hidden relative transition-all transform hover:scale-105" v-for="product in products" :key="product.id">
								<div class="image h-32 overflow-hidden">
									<img src="https://via.placeholder.com/100.png?text=Image" class="w-full mx-auto"/>
								</div>
								<div class="details p-6 flex flex-col pb-20">
									<div class="row flex-auto">
										<h4 class="text-gray-600 font-bold text-lg">{{ product.name }}</h4>
									</div>
									<div class="row">
										<h4 class="text-gray-600 font-bold text-sm" v-for="category in categories" v-if="category.id == product.category_id">{{ category.name }}</h4>
									</div>
									<div class="row">
										<h4 class="text-gray-600 font-bold text-sm">Php {{ product.price }}</h4>
									</div>
									<div class="absolute bottom-0 left-0 w-full flex gap-2 px-6 py-4">
										<inertia-link :href="'/dashboard/products/' + product.id" class="flex-auto py-1 h-10 text-center flex-1 focus:outline-none hover:bg-gray-100 rounded-md border-gray-300 border" @click.prevent="showProduct(product.name)">
											<span class="text-blue-500 font-bold leading-8 text-sm">View</span>
										</inertia-link>
										<button type="button" class="py-1 h-10 w-10 text-center focus:outline-none hover:bg-blue-600 rounded-md border-blue-300 bg-blue-500">
											<i class="material-icons leading-7 text-sm text-white">edit</i>
										</button>
										<button type="button" class="py-1 h-10 w-10 text-center focus:outline-none hover:bg-red-600 rounded-md border-red-300 bg-red-500">
											<i class="material-icons leading-7 text-sm text-white">delete</i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</transition>
			</div>

			<modal :active="activeModal" :productName="product.name"></modal>

			<transition name="show">
				<div class="h-screen w-screen bg-gray-200 bg-opacity-50 flex top-0 fixed left-0 scale-100 justify-items-center items-center" v-show="createModal == true">
					<div class="flex-auto">
						<transition name="modal">
							<div class="w-full mx-auto rounded-xl shadow-md bg-white scale-100 overflow-hidden" style="max-width: 500px" v-show="createModal == true">

								<!-- Steps Content -->
								<form @submit.prevent="addProduct()">
									
									<div class="steps-content p-8">
										<div>
											<h3 class="mb-4 text-2xl">
												Add Product
											</h3>
											<div class="relative">
												<input type="text" name="name" v-model="form.name" class="py-4 w-full pr-16 border-b-2 focus:outline-none transition-colors mt-2 transition-all" :class="generateErr ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500'" v-on:keyup="liveCountDown" placeholder="Product Name" maxlength="100" />
												<span class="rounded-md p-2 font-bold top-4 right-2 absolute h-9 w-12 text-center" :class="generateErr ? 'bg-red-300 text-red-500' : 'bg-gray-100 text-gray-800'">{{totalRemainCount}}</span>
											</div>
											<div class="mt-4">
												<label for="image" class="font-bold mb-4 block">Category</label>
												<input type="file" id="image" @change="onImageSelected" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name"/>
											</div>
											<div class="mt-4">
												<label for="category" class="font-bold mb-4 block">Category</label>
												<select name="category" id="category"v-model="form.category_id" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name">
													<option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
												</select>
											</div>
											<div class="mt-4">
												<label for="price" class="font-bold mb-4 block">Price</label>
												<div class="relative">
													<input type="text" id="price" name="price" v-model="form.price" class="px-3 py-2 pl-16 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Price" />
													<span class="rounded-md font-bold top-1 h-10 left-2 leading-9 absolute h-9 w-12 text-center">Php</span>
												</div>
											</div>
											<div id="success">{{ output }}</div>
										</div>
									</div>

								<!-- Steps Navigation -->
								<div class="px-8 py-6 mt-4 bg-gray-100 sticky bottom-0">
									<div class="flex justify-end">
										<button type="button" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center bg-white hover:bg-gray-200 font-medium mr-4" @click="createModal = false">
											Cancel
										</button>
										<button type="submit" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
											Add
										</button>
									</div>
								</div>

								</form>
							</div>
						</transition>
					</div>
				</div>
			</transition>
		</template>

	</dash-layout>
</template>

<script>
    import DashLayout from '@/Layouts/DashLayout'
    import JetButton from '@/Jetstream/Button'
    import Modal from '@/Components/MaterialModal'

    export default {
    	props: ['products', 'categories', 'pages'],
        components: {
            DashLayout,
            JetButton,
            Modal,
        },
        data() {
        	return {
        		activeModal: false,
        		createModal: false,
			    form: {
			    	name: null,
			    	category_id: null,
			    	image: '',
			    	price: null,
			    },
			    generateErr: false,
			    itemView: 'grid',
			    limitmaxCount: 100,
			    object: {
			      title: 'How to do lists in Vue',
			      author: 'Jane Doe',
			      publishedAt: '2016-04-10'
			    },
			    output: '',
			    product: {
			    	name: null,
			    },
        		step: 1,
				    totalRemainCount: 100,

        	}
		},
		methods: {
			addProduct() {
				this.$inertia.post('/dashboard/products', this.form)
					.then((response) => {
             		console.log(this.$inertia.page) });
				this.createModal = false;
			},
			resetForm() {
				this.form.name = null;
			    this.form.category_id = null;
			    this.form.image = '';
			    this.form.price = null;
			},
			liveCountDown() {
				this.totalRemainCount = this.limitmaxCount - this.form.name.length;
				this.generateErr = this.totalRemainCount < 0;
			},
			onImageSelected(event) {
				console.log(event);
			},
			showProduct: function(name) {
				this.activeModal = !this.activeModal;
				console.log(name);
				this.product.name = name;
			},
		},
		mounted() {
			console.log('Component mounted.');
		},
		created() {
		},
    }
	
</script>