<template>

	<div>	
			
            <nav-bar></nav-bar>
            <slot />
            
	</div>

</template>

<script>
	
	import navBar from './nav'

	export default{

		components:{navBar},

		data(){
			return{}
		},
		
	}
</script>