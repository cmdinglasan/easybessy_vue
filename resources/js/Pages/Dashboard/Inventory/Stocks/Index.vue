<template>
	<dash-layout>

		<!-- Header -->
		<template #header>
			Stocks
		</template>

		<template #actions>
			<button type="button" class="px-4 py-2 ml-4 h-10 bg-white hover:bg-gray-100 text-blue-500 font-bold rounded-md outline-none focus:outline-none transition-all text-sm" @click="addStock = true">
				<div class="flex items-center">
					<i class="material-icons">add</i>
					<span class="ml-2 mt-1">Add</span>
				</div>
			</button>
			<button type="button" class="px-4 py-2 ml-4 h-10 bg-white hover:bg-gray-100 text-blue-500 font-bold rounded-md outline-none focus:outline-none transition-all text-sm" @click="transferModal = true">
				<div class="flex items-center">
					<i class="material-icons">double_arrow</i>
					<span class="ml-2 mt-1">Transfer</span>
				</div>
			</button>
		</template>

		<template #content>
			<div class="relative text-right pl-4">
				<div class="relative">
					<select id="dropdown" name="dropdown" class="py-2 pl-4 pr-10 bg-white border rounded-md appearance-none" @change="changeItem($event)">
						<option>Products</option>
						<option>Branch</option>
					</select>
					<label for="dropdown" class="absolute top-0 right-0 p-2	">
						<i class="material-icons text-md" v-if="dropDown == true">unfold_more</i>
					</label><br/>
				</div>
			</div>

			<div class="relative mt-6">
				<transition name="cards">
					<div class="transition-all duration-500" v-if="filter == 'Products'">
						<div class="grid grid-cols-5 auto-rows-auto gap-6 w-full">
							<div class="hover:shadow-xl rounded-md bg-white overflow-hidden relative transition-all transform hover:scale-105" v-for="stock in stocks" :key="stock.id">
								<div v-for="product in products" v-if="stock.product_id == product.id">
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
					<div class="transition-all duration-500" v-if="filter == 'Branch'">
						<div class="relative flex gap-4">
							<div class="relative w-64">
								<h4 class="text-xs text-gray-500 font-bold mb-4">Branches</h4>
								<ol>
									<li class="mb-3">
										<button type="button" @click="sortAll()" class="border-l-2 pl-4 outline-none foucs:outline-none" :class="branchFilter == 'All' ? 'border-blue-500' : 'border-transparent'">
											<span class="font-bold">
												All Branches
											</span>
										</button>
									</li>
									<li v-for="branch in branches" class="mb-3">
										<button type="button" @click="sortItem(branch.id)" class="border-l-2 pl-4 outline-none foucs:outline-none" :class="branch.name == branchFilter ? 'border-blue-500' : 'border-transparent'">
											<span class="font-bold">
												{{ branch.name }}
											</span>
										</button>
									</li>
								</ol>
							</div>
							<div class="relative flex-auto">
								<div class="flex flex-col gap-2">
									<div class="relative p-4 bg-white rounded-md cursor-pointer hover:bg-gray-200" v-for="stock in stocksFiltered" :key="stock.id">
										<div class="relative">
											<div class="flex items-center">
												<div class="flex-1" v-for="product in products" v-if="stock.product_id == product.id">
													 <span class="text-xs uppercase" v-for="branch in branches" v-if="branchFilter == 'All' && stock.branch_id == branch.id">{{ branch.name }}</span>
													<h3 class="font-bold">{{ product.name }}</h3>

												</div>
												<div class="min-w-32 h-10">
													<div class="py-1 px-4 rounded-md text-white flex items-center" :class="stock.stock_qty > stock.minimum_stock ? 'bg-blue-500' : 'bg-red-500'">
														<!-- Icons -->
														<i class="material-icons leading-9" v-if="stock.stock_qty > stock.minimum_stock">check_circle</i>
														<i class="material-icons leading-9" v-if="stock.stock_qty <= stock.minimum_stock">info</i>

														<!-- Text -->
														<span class="ml-2 font-medium" v-if="stock.stock_qty > stock.minimum_stock">In Stock</span>
														<span class="ml-2 font-medium" v-if="stock.stock_qty <= stock.minimum_stock">Low Stock</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</transition>

				<transition name="show">
					<div class="h-screen w-screen bg-gray-200 bg-opacity-50 flex top-0 fixed left-0 scale-100 justify-items-center items-center" v-show="transferModal == true">
						<div class="flex-auto">
							<transition name="modal">
								<div class="w-full mx-auto rounded-xl shadow-md bg-white scale-100 overflow-hidden" style="max-width: 500px" v-show="transferModal == true">

									<!-- Steps Content -->
									<form @submit.prevent="transfer()">
										
										<div class="steps-content p-8">
											<div>
												<h3 class="mb-4 text-2xl">
													Transfer
												</h3>
												<div class="p-4 bg-red-500 rounded-md" v-if="error">
													<span v-text="error" class="font-bold text-white"></span>
												</div>
												<div class="flex gap-4">
													<div class="mt-4 flex-1">
														<label for="branchFrom" class="font-bold mb-4 block">From</label>
														<select name="branchFrom" id="branchFrom" v-model="transferForm.from" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name">
															<option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
														</select>
													</div>
													<div class="mt-4 flex-1">
														<label for="branchTo" class="font-bold mb-4 block">To</label>
														<select name="branchTo" id="branchTo" v-model="transferForm.to" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name">
															<option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
														</select>
													</div>
												</div>
												<div class="mt-4">
													<label for="product" class="font-bold mb-4 block">Product</label>
													<select name="product" id="product" v-model="transferForm.product" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name">
														<option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
													</select>
												</div>
												<div class="mt-4">
													<label for="amount" class="font-bold mb-4 block">Amount</label>
													<input type="text" id="amount" name="amount" v-model="transferForm.amount" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Amount" />
												</div>
											</div>
										</div>

									<!-- Steps Navigation -->
									<div class="px-8 py-6 mt-4 bg-gray-100 sticky bottom-0">
										<div class="flex justify-end">
											<button type="button" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center bg-white hover:bg-gray-200 font-medium mr-4" @click="transferModal = false">
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

				<transition name="show">
					<div class="h-screen w-screen bg-gray-200 bg-opacity-50 flex top-0 fixed left-0 scale-100 justify-items-center items-center" v-if="addStock == true">
						<div class="flex-auto">
							<transition name="modal">
								<div class="w-full mx-auto rounded-xl shadow-md bg-white scale-100 overflow-hidden" style="max-width: 500px" v-show="addStock == true">

									<!-- Steps Content -->
									<form @submit.prevent="stockStore()">
										
										<div class="steps-content p-8">
											<div>
												<h3 class="mb-4 text-2xl">
													Add stock
												</h3>
												<div class="p-4 bg-red-500 rounded-md" v-if="error">
													<span v-text="error" class="font-bold text-white"></span>
												</div>
												<div class="flex gap-4">
													<div class="mt-4 flex-1">
														<label for="stockBranch" class="font-bold mb-4 block">Branch</label>
														<select name="stockBranch" id="stockBranch" v-model="stockForm.branch" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name">
															<option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
														</select>
													</div>
												</div>
												<div class="mt-4">
													<label for="product" class="font-bold mb-4 block">Product</label>
													<select name="product" id="product" v-model="stockForm.product" class="px-3 py-2 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Product Name">
														<option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
													</select>
												</div>
												<div class="mt-4">
													<label for="amount" class="font-bold mb-4 block">Amount</label>
													<div class="relative">
														<input type="text" id="amount" name="amount" v-model="stockForm.amount" class="px-3 py-2 pl-16 w-full border-2 border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition-colors" placeholder="Amount" />
														<span class="rounded-md font-bold top-1 h-10 left-2 leading-9 absolute h-9 w-12 text-center text-gray-700">Php</span>
													</div>
												</div>
											</div>
										</div>

									<!-- Steps Navigation -->
									<div class="px-8 py-6 mt-4 bg-gray-100 sticky bottom-0">
										<div class="flex justify-end">
											<button type="button" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center bg-white hover:bg-gray-200 font-medium mr-4" @click="addStock = false">
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

			</div>
		</template>

	</dash-layout>	
</template>

<script>
    import DashLayout from '@/Layouts/DashLayout'
    import JetButton from '@/Jetstream/Button'
    import Modal from '@/Components/MaterialModal'

    export default {
    	props: ['branches','categories','products','stocks'],
        components: {
            DashLayout,
            JetButton,
            Modal,
        },
    	data() {
    		return {
    			addStock: false,
    			branchFilter: 'All',
    			dropDown: true,
    			dropDownSelect: 'Products',
    			error: null,
    			filter: 'Products',
    			stockForm: {
    				branch: null,
    				product: null,
    				amount: null,
    			},
    			stocksFiltered: [],
    			transferForm: {
    				from: null,
    				to: null,
    				product: null,
    				amount: null,
    			},
    			transferModal: false,
    		}
    	},
    	methods: {
    		changeItem: function(name) {
    			this.filter = name.target.value;
    		},
    		sortItem: function(id) {
    			axios.get('/dashboard/stocks/sort/' + id)
					.then((response) => {
             		this.stocksFiltered = response.data.stocks;
	         		this.branchFilter = response.data.branchName;
             	});
    		},
    		sortAll: function() {
    			axios.get('/dashboard/stocks/sort/')
					.then((response) => {
	         		this.stocksFiltered = response.data.stocks;
	         		this.branchFilter = 'All';
         		});
    		},
			stockStore() {
				axios.post('/dashboard/stocks', this.stockForm)
					.then((response) => {
						if(response.data.error) {
							this.error = response.data.error;
							console.log(response.data.error);
						} else {
	             			this.addStock = false;
						}
             		}).catch((error) => {
		         		this.error = error;
	         			console.log(this.error);
         			});
			},
    		transfer() {
    			axios.post('/dashboard/stocks/transfer', this.transferForm)
					.then((response) => {
						this.stocksFiltered = response.data.stocks;
		         		this.error = response.data.error;
		         		this.transferForm.reset();
	         			console.log(response.data)
		         	}).catch((error) => {
		         		this.error = error.data.error;
	         			console.log(this.error);
         			});
    		},
    	},
    	mounted() {
			this.sortAll();
    	},
    }
</script>