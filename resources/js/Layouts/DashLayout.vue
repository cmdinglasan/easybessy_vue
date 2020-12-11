<template>
	<div class="relative light:text-gray-700 dark:text-white">
		<!-- Side Nav-->
		<div class="fixed h-screen bg-white top-0 shadow-md overflow-y-auto overflow-x-hidden no-scrollbar transition-all z-10" :class="sidebar == true ? 'lg:w-64 left-0' : 'lg:w-24 -left-full md:left-0' ">
			<header class="bg-white sticky top-0 flex">
		        <div class="h-20 py-6 pl-8 pr-4" :class="sidebar == true ? 'w-64' : 'hidden' ">
		        	<img :src="asset('sprites/easybessy_pos-logo_full.png')" class="mx-auto">
		        </div>
				<div class="fas fa-bars text-2xl text-center h-20 py-6 px-8 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800" :class="sidebar == true ? 'w-20' : 'w-full'" @click="sidebar = !sidebar"></div>
		    </header>
		    <nav>
		    	<div class="nav-group">
		    		<div class="group-title px-9 pt-6" :class="sidebar == true ? 'block' : 'hidden' ">
		    			<h5 class="text-xs font-bold text-gray-400">Admin Tools</h5>
		    		</div>
		    		<div class="px-4 pt-4 pb-6">
		    			<inertia-link :href="route('dashboard')" class="block px-5 py-2 rounded-xl font-bold text-white flex items-center mb-1 transition-all" :class="route().current('dashboard') ? 'text-white bg-messy-blue ' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('dashboard') ? 'text-white' : 'text-gray-400'">
		    					<i class="material-icons leading-10">dashboard</i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Overview</span>
		    			</inertia-link>
		    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1" :class="route().current('product.index') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('product.index') ? 'text-white' : 'text-gray-400'">
		    					<i class="fas fa-shopping-bag"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Products</span>
		    			</inertia-link>
		    			<inertia-link :href="route('branch.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('branch.index') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('branch.index') ? 'text-white' : 'text-gray-400'">
		    					<i class="fas fa-store"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Branches</span>
		    			</inertia-link>
		    			<inertia-link :href="route('stocks.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1" :class="route().current('stocks.index') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('stocks.index') ? 'text-white' : 'text-gray-400'">
		    					<i class="fas fa-box"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Stocks</span>
		    			</inertia-link>
		    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
		    					<i class="fas fa-user"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Users</span>
		    			</inertia-link>
		    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-xl" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
		    					<i class="fas fa-clipboard-list"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Transactions</span>
		    			</inertia-link>
		    		</div>
		    	</div>
		    	<div class="nav-group">
		    		<div class="group-title px-8 " :class="sidebar == true ? 'block' : 'hidden' ">
		    			<h5 class="text-xs font-bold text-gray-400">More</h5>
		    		</div>
		    		<div class="px-3 pt-4 pb-6">
		    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
		    					<i class="far fa-envelope"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Messages</span>
		    			</inertia-link>
		    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
		    					<i class="far fa-bell"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Notifications</span>
		    			</inertia-link>
		    		</div>
		    	</div>
		    	<div class="nav-group">
		    		<div class="group-title px-8 " :class="sidebar == true ? 'block' : 'hidden' ">
		    			<h5 class="text-xs font-bold text-gray-400">Miscellaneous</h5>
		    		</div>
		    		<div class="px-3 pt-4 pb-6">
		    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
		    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
		    					<i class="far fa-envelope"></i>
		    				</div>
		    				<span :class="sidebar == true ? 'inline-block ml-4 dark:text-white' : 'hidden' ">Credits</span>
		    			</inertia-link>
		    		</div>
		    	</div>
		    </nav>
		</div>

		<div class="relative">
			<div class="relative">
				
				<header class="py-2 px-1 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 h-16 fixed top-0 w-full z-20">
					<div class="relative flex gap-4	">
						<div class="left-pane flex">
							<div class="relative flex mr-2">
								<div class="action-bar">
									<button class="p-3 h-12 w-12 hover:bg-gray-100 rounded-full mx-2 outline-none focus:outline-none dark:text-white dark:hover:text-gray-700" @click="sidebar = !sidebar">
										<i class="material-icons">menu</i>
									</button>
								</div>
								<div class="logo">
									<inertia-link :href="route('dashboard')">
										<div class="h-12">
											<img :src="'sprites/easybessy_pos-logo_full.png'" class="h-full">
										</div>
									</inertia-link>
								</div>
							</div>
						</div>
						<div class="search flex-1 hidden md:block">
							<div class="relative flex">
								<form method="get" class="search-box w-full h-12 rounded-md bg-gray-100 dark:bg-gray-900 dark:text-white py-2 px-4 flex" style="max-width: 720px;">
									<div class="icon h-8 w-8 text-center py-1 mr-2">
										<i class="material-icons">search</i>
									</div>
									<div class="search">
										<input type="text" placeholder="Search" class="outline-none focus:outline-none px-2 py-1 bg-transparent"/>
									</div>
								</form>
							</div>
						</div>
						<div class="right-pane flex-1 mx-2">
							<div class="relative flex justify-end">
								<div class="relative">
									<button class="p-3 h-12 w-12 hover:bg-gray-100 rounded-full mx-2 outline-none focus:outline-none dark:text-white dark:hover:text-gray-700" @click="accountModal = !accountModal">
										<i class="material-icons">settings</i>
									</button>
								</div>
								<div class="account p-2 relative">
									<button class="rounded-full overflow-hidden focus:outline-none outline-none ring-4 ring-transparent focus:ring-gray-100 h-8 w-8" @click="accountModal = !accountModal">
										<img :src="currentUser.image" class="h-8"/>
									</button>
									<div class="fixed right-0 md:right-2 w-full bg-white rounded-md shadow-md origin-top-right top-14 md:top-12 dark:border-gray-800 dark:text-gray-700 w-96 transition-all" v-show="accountModal">
										<div class="px-4 py-6 border-b text-center">
											<div class="h-16">
												<img :src="currentUser.image" class="h-14 w-14 rounded-full mx-auto"/>
											</div>
											<div class="mt-2">
												<h2 class="font-medium text-lg" v-text="currentUser.name"/>
												<span class="text-sm" v-text="currentUser.email"/>
											</div>
											<inertia-link href="/profile">
												<div class="inline-block py-2 px-4 border border-gray-300 rounded-full text-center mt-4 mx-10 hover:bg-gray-100">
													<span class="font-medium text-xs">Manage your Messy account</span>
												</div>
											</inertia-link>
										</div>
										<div class="p-6">
											<form :action="route('logout')" method="post" class="text-center">
												<button type="submit">
													<div class="inline-block py-2 px-4 bg-blue-500 rounded-md text-center hover:bg-blue-600 mx-auto">
														<span class="font-bold text-xs text-white">Logout</span>
													</div>
												</button>
												<input type="hidden" name="_token" :value="csrf">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>

				<div class="relative transition-all" :class="sidebar == true ? 'md:ml-64' : 'md:ml-24' ">
					<div class="mx-auto my-16 text-gray-700">
						<div class="relative bg-blue-500 text-white">
							<div class="container mx-auto px-6 md:px-0">
								<div class="pt-4">
									<div class="header flex justify-between">
										<div class="header py-6">
											<h2 class="text-3xl font-bold my-4">
												<slot name="header"/>
											</h2>
										</div>
										<div class="action py-10">
											<slot name="actions"/>
										</div>
									</div>
									<div class="action pt-2 sticky top-16">
										<slot name="tabs"/>
									</div>
								</div>
							</div>
						</div>

						<div class="relative mt-10 mb-4">
							<div class="container mx-auto px-6 md:px-0">
								<slot name="content"/>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</template>

<script>
	import EbSidebar from '@/Components/EBSidebar'

	export default {
        components: {
            EbSidebar
        },
        data() {
        	return {
        		csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
	            currentUser: [],
	            user: null,
	            accountModal: false,
	            sidebar: false,
        	}
        },
        mounted() {
        	axios.get('/api/user')
        		.then((response) => { 
        			this.currentUser = response.data; 
        		})
		        .catch(function (error) {
		          	console.log(error);
		        })
        }
    }
</script>