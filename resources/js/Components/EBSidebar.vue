<template>
	<!-- Side Nav-->
	<div class="fixed h-screen bg-white top-0 -left-64 shadow-md overflow-y-auto overflow-x-hidden no-scrollbar transition z-10" :class="sidebar == true ? 'w-64' : 'w-24' ">
		<header class="bg-white sticky top-0 flex">
	        <div class="h-20 py-6 pl-8 pr-4" :class="sidebar == true ? 'w-64' : 'hidden' ">
	        	<img :src="'/sprites/easybessy_pos-logo_full.png'" class="mx-auto">
	        </div>
			<div class="fas fa-bars text-2xl text-center h-20 py-6 px-8 cursor-pointer hover:bg-gray-200" :class="sidebar == true ? 'w-20' : 'w-full'" @click="sidebar = !sidebar"></div>
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
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Overview</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1" :class="route().current('product.index') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('product.index') ? 'text-white' : 'text-gray-400'">
	    					<i class="fas fa-shopping-bag"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Products</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
	    					<i class="fas fa-store"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Branches</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('linkRoute') ? 'text-white' : 'text-gray-400'">
	    					<i class="fas fa-box"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Stocks</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
	    					<i class="fas fa-user"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Users</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-xl" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
	    					<i class="fas fa-clipboard-list"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Transactions</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('linkRoute') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
	    					<i class="fas fa-cog"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Settings</span>
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
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Messages</span>
	    			</inertia-link>
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-5 text-center leading-10 text-lg" :class="route().current('routeLink') ? 'text-white' : 'text-gray-400'">
	    					<i class="far fa-bell"></i>
	    				</div>
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Notifications</span>
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
	    				<span :class="sidebar == true ? 'inline-block ml-4' : 'hidden' ">Credits</span>
	    			</inertia-link>
	    		</div>
	    	</div>
	    	<div class="nav-group sticky bottom-0 bg-white">
	    		<div class="group-title px-8 pt-2" :class="sidebar == true ? 'block' : 'hidden' ">
	    			<h5 class="text-xs font-bold text-gray-400">Account</h5>
	    		</div>
	    		<div class="px-3 pb-2">
	    			<inertia-link :href="route('product.index')" class="block px-5 py-2 rounded-xl font-bold flex items-center mb-1 transition-all" :class="route().current('routeLink') ? 'text-white bg-messy-blue' : 'text-gray-600'">
	    				<div class="h-10 w-10 text-center leading-10 mr-4 text-lg text-messy-blue rounded-full overflow-hidden">
	    					<img src="https://via.placeholder.com/150"/>
	    				</div>
	    				<span></span>
	    			</inertia-link>
	    		</div>
	    	</div>
	    </nav>
	</div>
</template>

<script type="text/javascript">
	export default {
        props: ['on', 'show'],
        data() {
        	return {
        		sidebar: false,
        	}
        },
        created() {
        		console.log(this.show);
        },
    }
</script>