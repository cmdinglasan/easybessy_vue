<template>

	<!-- Main Screen -->
	<div class="h-screen overflow-auto bg-gray-100 text-gray-700">

		<!-- Sidebar -->
		<div class="fixed top-0 h-full w-full z-30 transition-all duration-200" :class="sidebar == true ? 'left-0' : '-left-full'">
			<div class="background absolute w-full h-full z-10 bg-gray-200 bg-opacity-25" @click="sidebar = false"></div>
			<div class="p-6 w-4/5 md:w-72 bg-white h-screen overflow-auto shadow-md relative z-20">
				<nav>
					<div class="relative">
						<div class="border-b border-dashed py-4 px-2">
							<img :src="'/sprites/easybessy_pos-logo_full.png'" class="mx-auto">
						</div>
					</div>
					<div class="nav-group pt-4">
						<div class="bg-gray-100 rounded-md overflow-hidden">
							<div class="relative p-4 flex items-center" @click="profileDropdown = !profileDropdown" :class="profileDropdown == true ? 'bg-gray-200' : 'bg-gray-100'">
								<div class="photo w-10 h-10 rounded-full overflow-hidden mr-4">
									<img src="https://via.placeholder.com/75"/>
								</div>
								<div class="name">
									<h4 class="font-bold text-sm">
										Christian Dinglasan
									</h4>
								</div>
							</div>
							<div class="bg-gray-100" v-show="profileDropdown">
								<inertia-link href="profile" class="block text-sm p-4">Profile</inertia-link>
								<inertia-link :href="route('logout')" class="block text-sm p-4">Logout</inertia-link>
							</div>
						</div>
					</div>
					<div class="nav-group pt-4">
			    		<div class="pt-4 pb-6">
			    			<inertia-link :href="route('pos')" class="block px-5 py-2 rounded-xl font-bold text-white flex items-center mb-1 transition-all" :class="route().current('pos') ? 'text-white bg-messy-blue ' : 'text-gray-600'">
			    				<div class="h-10 w-5 text-center leading-10 mr-4 text-lg" :class="route().current('pos') ? 'text-white' : 'text-gray-400'">
			    					<i class="fas fa-chart-line"></i>
			    				</div>
			    				<span>Overview</span>
			    			</inertia-link>
			    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1" :class="route().current('product.index') ? 'text-white bg-messy-blue' : 'text-gray-600'">
			    				<div class="h-10 w-5 text-center leading-10 mr-4 text-lg" :class="route().current('product.index') ? 'text-white' : 'text-gray-400'">
			    					<i class="fas fa-shopping-bag"></i>
			    				</div>
			    				<span>Products</span>
			    			</inertia-link>
			    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
			    				<div class="h-10 w-5 text-center leading-10 mr-4 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
			    					<i class="fas fa-store"></i>
			    				</div>
			    				<span>Branches</span>
			    			</inertia-link>
			    		</div>
			    	</div>
			    	<div class="nav-group pt-4">
			    		<div class="group-title px-4">
			    			<h5 class="text-xs font-bold text-gray-400">More</h5>
			    		</div>
			    		<div class="pt-4 pb-6">
			    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
			    				<div class="h-10 w-5 text-center leading-10 mr-4 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
			    					<i class="far fa-envelope"></i>
			    				</div>
			    				<span>Messages</span>
			    			</inertia-link>
			    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
			    				<div class="h-10 w-5 text-center leading-10 mr-4 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
			    					<i class="far fa-bell"></i>
			    				</div>
			    				<span>Notifications</span>
			    			</inertia-link>
			    		</div>
			    	</div>
				</nav>
			</div>
		</div>

		<!-- Content -->
		<div class="relative h-screen container mx-auto">
			<div class="sticky top-0 flex justify-between pt-6 z-10 bg-gray-100">
				<div class="p-8">
					<div class="h-6 w-6" @click="sidebar = true">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<path d="M176.792,0H59.208C26.561,0,0,26.561,0,59.208v117.584C0,209.439,26.561,236,59.208,236h117.584    C209.439,236,236,209.439,236,176.792V59.208C236,26.561,209.439,0,176.792,0z M196,176.792c0,10.591-8.617,19.208-19.208,19.208    H59.208C48.617,196,40,187.383,40,176.792V59.208C40,48.617,48.617,40,59.208,40h117.584C187.383,40,196,48.617,196,59.208    V176.792z"/>
							<path d="M452,0H336c-33.084,0-60,26.916-60,60v116c0,33.084,26.916,60,60,60h116c33.084,0,60-26.916,60-60V60    C512,26.916,485.084,0,452,0z M472,176c0,11.028-8.972,20-20,20H336c-11.028,0-20-8.972-20-20V60c0-11.028,8.972-20,20-20h116    c11.028,0,20,8.972,20,20V176z"/>
							<path d="M176.792,276H59.208C26.561,276,0,302.561,0,335.208v117.584C0,485.439,26.561,512,59.208,512h117.584    C209.439,512,236,485.439,236,452.792V335.208C236,302.561,209.439,276,176.792,276z M196,452.792    c0,10.591-8.617,19.208-19.208,19.208H59.208C48.617,472,40,463.383,40,452.792V335.208C40,324.617,48.617,316,59.208,316h117.584    c10.591,0,19.208,8.617,19.208,19.208V452.792z"/>
							<path d="M452,276H336c-33.084,0-60,26.916-60,60v116c0,33.084,26.916,60,60,60h116c33.084,0,60-26.916,60-60V336    C512,302.916,485.084,276,452,276z M472,452c0,11.028-8.972,20-20,20H336c-11.028,0-20-8.972-20-20V336c0-11.028,8.972-20,20-20    h116c11.028,0,20,8.972,20,20V452z"/>
						</svg>
					</div>
				</div>
				<div class="p-8 relative">
					<button class="outline-none focus:outline-none h-6 w-6 relative" @click="checkout = true">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 321.2 321.2" style="enable-background:new 0 0 321.2 321.2;" xml:space="preserve">
							<path d="M306.4,313.2l-24-223.6c-0.4-3.6-3.6-6.4-7.2-6.4h-44.4V69.6c0-38.4-31.2-69.6-69.6-69.6c-38.4,0-69.6,31.2-69.6,69.6    v13.6H46c-3.6,0-6.8,2.8-7.2,6.4l-24,223.6c-0.4,2,0.4,4,1.6,5.6c1.2,1.6,3.2,2.4,5.2,2.4h278c2,0,4-0.8,5.2-2.4    C306,317.2,306.8,315.2,306.4,313.2z M223.6,123.6c3.6,0,6.4,2.8,6.4,6.4c0,3.6-2.8,6.4-6.4,6.4c-3.6,0-6.4-2.8-6.4-6.4    C217.2,126.4,220,123.6,223.6,123.6z M106,69.6c0-30.4,24.8-55.2,55.2-55.2c30.4,0,55.2,24.8,55.2,55.2v13.6H106V69.6z     M98.8,123.6c3.6,0,6.4,2.8,6.4,6.4c0,3.6-2.8,6.4-6.4,6.4c-3.6,0-6.4-2.8-6.4-6.4C92.4,126.4,95.2,123.6,98.8,123.6z M30,306.4    L52.4,97.2h39.2v13.2c-8,2.8-13.6,10.4-13.6,19.2c0,11.2,9.2,20.4,20.4,20.4c11.2,0,20.4-9.2,20.4-20.4c0-8.8-5.6-16.4-13.6-19.2    V97.2h110.4v13.2c-8,2.8-13.6,10.4-13.6,19.2c0,11.2,9.2,20.4,20.4,20.4c11.2,0,20.4-9.2,20.4-20.4c0-8.8-5.6-16.4-13.6-19.2V97.2    H270l22.4,209.2H30z"/>
						</svg>
						<span v-if="cartCount" class="text-xs h-5 w-5 p-1 absolute -top-2 -right-2 text-center font-bold text-white bg-messy-blue rounded-full block" v-text="cartCount"></span>
					</button>
				</div>
			</div>

			<!-- Announcement Board -->
			<div class="relative">
				<div class="mx-8 my-4">
					<div class="h-32 w-full overflow-hidden">

						<!-- Slides -->
						<div class="relative">
							<img :src="'/sprites/slideshow_1.png'" />
						</div>

					</div>
				</div>
			</div>

			<!-- Product List -->
			<div class="relative pb-4">
				<div class="lg:grid lg:grid-cols-3">
					<div class="row px-8 p-2 mb-2 flex items-center" v-for="product in products" @click="showModal(product.id, product.name, product.category_id, product.price)">
						<div class="photo w-20 h-20 mr-4 rounded-md overflow-hidden">
							<img src="https://via.placeholder.com/150">
						</div>
						<div class="flex-auto details py-2">
							<h3 class="font-bold text-sm mb-2">
								{{ product.name }}
							</h3>
							<span class="mt-2 py-1 px-2 text-xs bg-gray-200 rounded-md">
								Php {{ product.price }}
							</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Product Modal -->
			<div class="fixed h-screen z-20 left-0 w-full transition-all duration-300 bg-gray-100 bg-opacity-50" :class="productModal == true ? 'top-0' : 'top-full'">

				<div class="relative h-screen md:w-full md:flex md:justify-items-center md:items-center overflow-auto">
					<div class="relative h-screen container md:h-1/2 md:w-full lg:w-1/2 lg:flex mx-auto md:rounded-md overflow-auto">

						<!-- Action Bar -->
						<div class="px-6 py-8 absolute top-0 z-20">
							<button type="button" class="h-10 w-10 p-3 bg-white rounded-full" @click="productModal = false, resetModal()">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512.001" style="enable-background:new 0 0 512 512.001;" xml:space="preserve">
									<path d="M284.284,256L506.142,34.142c7.811-7.81,7.811-20.474,0-28.284c-7.811-7.811-20.474-7.811-28.284,0L256,227.716    L34.142,5.858c-7.811-7.811-20.474-7.811-28.284,0c-7.811,7.81-7.811,20.474,0,28.284L227.716,256L5.858,477.858    c-7.811,7.811-7.811,20.474,0,28.284c7.81,7.81,20.473,7.811,28.284,0L256,284.284l221.858,221.858    c7.81,7.81,20.473,7.811,28.284,0c7.811-7.811,7.811-20.474,0-28.284L284.284,256z"/>
								</svg>
							</button>
						</div>

						<!-- Modal Cover -->
						<div class="absolute top-0 w-full md:pr-72 h-full bg-messy-blue md:flex md:items-center md:justify-items-center">
							<div class="cover h-64 md:h-72 py-6 md:py-0 w-full md:overflow-hidden">
								<img src="https://via.placeholder.com/400x400?text=Product+Image" class="mx-auto">
							</div>
						</div>

						<!-- Modal Details -->
						<div class="absolute w-full md:w-72 md:right-0 md:h-full md:rounded-none mt-48 rounded-t-xl bg-white p-8 transition-all delay-100 duration-200" :class="productModal == true ? 'bottom-0' : '-bottom-full'">
							<div class="relative">
								<div class="relative mb-4">
									<div class="title pt-6">
										<span class="py-1 px-2 rounded-full bg-gray-200 text-xs mb-2 inline-block" v-for="category in categories" v-if="item.cat == category.id">{{ category.name }}</span>
										<h2 class="font-bold text-xl">{{ item.name }}</h2>
										<h3 class="font-bold text-lg">
											<small>PHP</small> {{ item.price }}
										</h3>
									</div>
								</div>
								<div class="relative mb-4">
									<div class="flex items-center justify-between">
										<div class="relative">
											<h4>Quantity</h4>
										</div>
										<div class="relative flex items-center">
											<button class="w-8 h-8 bg-gray-100 rounded-l-md" @click="item.quantity--">
												<i class="fas fa-minus text-sm"></i>
											</button>
											<input class="w-10 h-8 text-center bg-gray-100" type="numeric" v-model="item.quantity"/>
											<button class="w-8 h-8 bg-gray-100 rounded-r-md" @click="item.quantity++">
												<i class="fas fa-plus text-sm"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="relative">
									<button type="button" class="w-full p-4 rounded-full outline-none focus:outline-none font-bold text-white bg-gray-700" @click="addToCart()">Add to cart</button>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>

		</div>

		<!-- Checkout -->
		<div class="fixed h-screen w-screen md:w-1/2 lg:w-1/3 md:shadow-md top-0 z-20 bg-white transition-all duration-200" :class="checkout == true ? 'right-0' : '-right-full'">

			<div class="relative h-screen">
				<div class="absolute h-full w-full overflow-auto transition-all duration-200" :class="step == 1 && step < 2 ? 'top-0' : '-top-full' ">
					<div class="relative h-screen overflow-y-auto">
					<!-- Action Bar -->
						<div class="px-6 py-8 sticky top-0 z-10">
							<button type="button" class="h-10 w-10 p-2 bg-white rounded-full" @click="checkout = false">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
									<path d="M492,236H68.442l70.164-69.824c7.829-7.792,7.859-20.455,0.067-28.284c-7.792-7.83-20.456-7.859-28.285-0.068    l-104.504,104c-0.007,0.006-0.012,0.013-0.018,0.019c-7.809,7.792-7.834,20.496-0.002,28.314c0.007,0.006,0.012,0.013,0.018,0.019    l104.504,104c7.828,7.79,20.492,7.763,28.285-0.068c7.792-7.829,7.762-20.492-0.067-28.284L68.442,276H492    c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/>
								</svg>
							</button>
						</div>

						<!-- Header -->
						<div class="mt-4 mb-6 px-8">
							<h2 class="font-bold text-xl">Checkout</h2>
						</div>

						<!-- Product List -->
						<div class="relative pb-6">
							<div class="flex mb-4" v-if="cartItems" v-for="cartItem in cartItems">
								<div class="w-1/2 mr-4 bg-gray-100 overflow-hidden rounded-r-2xl relative bg-cover" style="background-image: url('https://www.concept-phones.com/wp-content/uploads/2020/04/google-pixel-vector-concept-design-1.jpg');">
								</div>
								<div class="w-1/3 py-2 mr-8 text-right" v-for="product in products" v-if="product.id == cartItem.product_id">
									<div class="name">
										<h4 class="font-bold text-xl">{{ product.name }}</h4>
									</div>
									<div class="price my-2">
										<span class="text-sm py-1 px-2 bg-gray-100 rounded-lg font-bold">Php {{ cartItem.quantity * product.price }}</span>
									</div>
									<div class="action mt-4 rounded-md flex justify-end">
										<button class="w-8 h-8 bg-gray-100 rounded-l-md" @click="cartItem.quantity--">
											<i class="fas fa-minus text-sm"></i>
										</button>
										<input class="w-10 h-8 text-center bg-gray-100" type="numeric" v-model="cartItem.quantity"/>
										<button class="w-8 h-8 bg-gray-100 rounded-r-md" @click="cartItem.quantity++">
											<i class="fas fa-plus text-sm"></i>
										</button>
										<button class="w-10 h-8 text-center text-white bg-red-500 ml-4 rounded-md" @click="destroy(cartItem.id)">
											<i class="fas fa-trash text-sm"></i>
										</button>
									</div>
								</div>
							</div>
							<div class="px-8 text-sm" v-if="cartItems == false">
								Nothing to see here. Try adding products to cart.
							</div>
						</div>

						<!-- Footer -->
						<div class="absolute w-full h-20 bg-gray-700 rounded-t-xl transition-all" :class="cartItems != false ? 'bottom-0' : '-bottom-20'">
							<div class="relative flex justify-between">
								<div class="price text-white px-8 py-3" v-for="cart in carts">
									<span class="text-sm">Php</span> 
									<h3 class="font-bold text-xl">{{ cart.cart_price }}</h3>
								</div>
								<div class="next">
									<button type="button" class="h-10 bg-white rounded-md font-bold px-8 text-center outline-none focus:outline-none mr-8 mt-5" @click="step = 2">
										<span>Pay</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Payment -->
				<div class="absolute h-full bg-gray-700 w-full overflow-auto transition-all duration-200" :class="step == 2 && step < 3 ? 'top-0' : 'top-full' ">
					
					<div class="relative h-screen overflow-y-auto">
						<!-- Action Bar -->
						<div class="px-6 py-8 sticky top-0">
							<button type="button" class="h-10 w-10 p-2" @click="step = 1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512.001" style="enable-background:new 0 0 512 512.001;" xml:space="preserve" fill="white">
									<path d="M284.284,256L506.142,34.142c7.811-7.81,7.811-20.474,0-28.284c-7.811-7.811-20.474-7.811-28.284,0L256,227.716    L34.142,5.858c-7.811-7.811-20.474-7.811-28.284,0c-7.811,7.81-7.811,20.474,0,28.284L227.716,256L5.858,477.858    c-7.811,7.811-7.811,20.474,0,28.284c7.81,7.81,20.473,7.811,28.284,0L256,284.284l221.858,221.858    c7.81,7.81,20.473,7.811,28.284,0c7.811-7.811,7.811-20.474,0-28.284L284.284,256z"/>
								</svg>
							</button>
						</div>

						<!-- Header -->
						<div class="mt-4 mb-6 px-8 sticky top-0">
							<h2 class="font-bold text-xl text-white">Payment</h2>
						</div>

						<!-- Content -->
						<div class="px-8 py-4">

							<div class="relative">
								<div class="relative mb-6">
									<label for="payment" class="text-sm font-bold block mb-2 text-white">Payment method</label>
									<select id="payment" class="px-4 py-2 rounded-md text-white bg-gray-800 w-full">
										<option value="1">Cash</option>
										<option value="2">Credit / Debit Card</option>
										<option value="3">Gcash</option>
										<option value="4">Paymaya</option>
									</select>
								</div>

								<!-- Payment Info -->
								<div class="mb-4 bg-white rounded-md" v-for="item in carts">
									<div class="relative p-8 border-b-2 border-dashed">
										<h2 class="text-3xl inline-block font-bold">
											{{ item.cart_price }}
										</h2>
										<span class="inline-block uppercase">Php</span>
									</div>
									<div class="relative p-8">
										<div class="relative mb-2">
											<label class="text-sm font-bold block">Payment method</label>
											<span>Cash</span>
										</div>
										<div class="relative mb-2">
											<label class="text-sm font-bold block">Invoice Number</label>
											<span>#0000001</span>
										</div>
									</div>
								</div>

							</div>
						</div>

						<!-- Footer -->
						<div class="relative w-full h-20 rounded-t-xl">
							<div class="relative flex justify-end">
								<div class="next px-8">
									<button type="button" class="h-10 bg-white rounded-md font-bold px-8 text-center outline-none focus:outline-none" @click="gateway = true, checkout = false">
										<span>Continue</span>
									</button>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Gateway -->
		<div class="fixed h-screen w-screen md:w-1/2 lg:w-1/3 top-0 z-30 bg-white transition-all duration-200" :class="gateway == true ? 'right-0' : '-right-full'">

			<div class="relative h-screen">
				<div class="absolute h-full bg-gray-700 w-full overflow-auto transition-all duration-200 z-30">
					
					<div class="relative h-screen overflow-y-auto flex justify-items-center items-center">
						<!-- Action Bar -->
						<div class="px-6 py-8 absolute top-0 w-full">
							<button type="button" class="h-10 w-10 p-2 outline-none focus:outline-none" @click="step = 1; gateway = false">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512.001" style="enable-background:new 0 0 512 512.001;" xml:space="preserve" fill="white">
									<path d="M284.284,256L506.142,34.142c7.811-7.81,7.811-20.474,0-28.284c-7.811-7.811-20.474-7.811-28.284,0L256,227.716    L34.142,5.858c-7.811-7.811-20.474-7.811-28.284,0c-7.811,7.81-7.811,20.474,0,28.284L227.716,256L5.858,477.858    c-7.811,7.811-7.811,20.474,0,28.284c7.81,7.81,20.473,7.811,28.284,0L256,284.284l221.858,221.858    c7.81,7.81,20.473,7.811,28.284,0c7.811-7.811,7.811-20.474,0-28.284L284.284,256z"/>
								</svg>
							</button>
						</div>

						<!-- Content -->
						<div class="flex-auto mt-4 mb-6 px-8 text-white text-center">
							<div class="relative mb-4 p-6 bg-green-500 rounded-full inline-block">
								<i class="fas fa-check text-5xl"></i>
							</div>
							<h2 class="font-bold text-xl">Transaction Successful</h2>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</template>

<script>

    export default {
    	props: ['carts', 'cartCount', 'cartItems', 'categories', 'products', 'sort',],
        components: {
        },
        data() {
        	return {
        		checkout: false,
        		count: this.cartCount,
        		delete: {
        			item: null,
        		},
        		gateway: false,
        		item: {
        			id: null,
        			cat: null,
        			name: null,
        			price: null,
        			quantity: 1,
        			delete: null,
        		},
        		productModal: false,
        		profileDropdown: false,
        		search: null,
        		sidebar: false,
        		step: 1,
        	}
        },
        methods: {
        	addToCart() {
        		this.$inertia.post('/pos/cart', this.item, {
					onSuccess: (response) => {
             			this.resetModal() 
             		}
        		})
        	},
        	changeItem(id) {
        		this.itemName = id;

        		return this.item.name;
        	},
        	destroy: function(id) {
        		this.item.name = id;
        		this.$inertia.post('/pos/cart/delete', this.item, {
					onSuccess: (response) => {
             			console.log('Product with ID '+ id +' was deleted');
	        		}
	        	})
        	},
        	showModal: function(id, name, category_id, price) {
        		this.productModal = true;
				this.item.id = id;
				this.item.name = name;
				this.item.cat = category_id;
				this.item.price = price;
        	},
        	resetModal() {
        		this.productModal = false;
				this.item.id = null;
				this.item.name = null;
				this.item.cat = null;
				this.item.price = null;
				this.item.quantity = 1;
        	},
        },
        computed: {
		    filteredList() {
			    
			}
	    }
    }
	
</script>