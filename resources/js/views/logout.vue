<template>

</template>

<script>
    export default {
      mounted () {

        axios.post('/api/logout',{
              headers: {
                    'Content-Type':'application/json',
                    'Accept':'application/json',
                   'Authorization': 'Bearer '+localStorage.getItem('access_token')

                 }
            })
            // .then(response => {
            //
            //     console.log(response)
            // }).catch(error=>{
            //   console.log(error)
            // });


            localStorage.removeItem('access_token')
            this.$router.push('login')
        }
    }
</script>
