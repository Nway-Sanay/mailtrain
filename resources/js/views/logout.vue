<template>

</template>

<script>
    export default {
      mounted () {
console.log(localStorage.getItem('access_token'));
        axios.post('/api/logout').then(({data})=>{
          localStorage.removeItem('access_token')
          this.$router.push('login')
        })

        // ,{
        //       headers: {
        //             'Content-Type':'application/json',
        //             'Accept':'application/json',
        //            'Authorization': 'Bearer '+localStorage.getItem('access_token')
        //
        //          }
        //     }
            // .then(response => {
            //
            //     console.log(response)
            // }).catch(error=>{
            //   console.log(error)
            // });
              console.log('second')


        }
    }
</script>
