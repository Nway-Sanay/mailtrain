<template>

</template>

<script>
    export default {
      mounted () {

      			axios.get('/api/logout',{headers: {
                        'content-type':'application/json',
                        accept:'application/json',
                       Authorization: 'Bearer '+localStorage.getItem('access_token')
                     }
                
                })

             localStorage.removeItem('access_token')
			this.$router.push('/')		
        }  
    }
</script>
