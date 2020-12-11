<template>
	<dash-layout>
		
        <template #header>
            User Management
        </template>

        <template #actions>
            <button type="button" class="px-4 py-2 ml-4 h-10 bg-white hover:bg-gray-100 text-blue-500 font-bold rounded-md outline-none focus:outline-none transition-all text-sm" @click="createModal = true">
                <div class="flex items-center">
                    <i class="material-icons">add</i>
                    <span class="ml-2 mt-1">Add</span>
                </div>
            </button>
        </template>

	</dash-layout>
</template>

<script>
    import DashLayout from '@/Layouts/DashLayout'
    import JetButton from '@/Jetstream/Button'
    import Modal from '@/Components/MaterialModal'

    export default {
    	props: ['products','categories','stocks','branches'],
        components: {
            DashLayout,
            JetButton,
            Modal,
        },
    	data() {
    		return {
    			dropDown: true,
    			dropDownSelect: 'Products',
    			filter: 'Products',
    		}
    	},
    	methods: {
    		changeItem: function(name) {
    			this.filter = name.target.value;
    		}
    	},
    	mounted() {

    	},
    }
</script>