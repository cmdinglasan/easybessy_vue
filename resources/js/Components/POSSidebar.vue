<template>
	<!-- Side Nav-->
	<div class="fixed h-screen w-64 bg-white top-0 left-0 border-r border-gray-200 overflow-auto">
		<header class="bg-white sticky top-0">
	        <div class="p-9 border-b">
	        	<img :src="'/sprites/easybessy_pos-logo_full.png'" class="mx-auto">
	        </div>
	    </header>
	    <nav>
	    	<div class="nav-group">
	    		<div class="px-4 pt-4 pb-6">
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
	    	<div class="nav-group">
	    		<div class="group-title px-8 ">
	    			<h5 class="text-xs font-bold text-gray-400">More</h5>
	    		</div>
	    		<div class="px-3 pt-4 pb-6">
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
	    	<div class="nav-group sticky bottom-0 bg-white">
	    		<div class="group-title px-8 pt-2">
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
        props: ['on'],
    }	
</script>