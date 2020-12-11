<template>
	<dash-layout>
		
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