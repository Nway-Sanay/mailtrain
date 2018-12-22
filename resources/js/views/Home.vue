<template>
    <div class="container">
      <button type="button" name="button" @click="fetchData">Refresh</button>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{title}}</div>

                    <div class="card-body">
                        {{mails}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){

        return{
            title:"Inbox",
            mails:''
        }

      },

      methods:{
        fetchData(){
            axios.get('/api/inbox',{
                  headers: {
                        'Content-Type':'application/json',
                        'Accept':'application/json',
                       'Authorization': 'Bearer '+localStorage.getItem('access_token')
                       
                     }
                }).then(response => {

                    // console.log(response)
                })

                // .catch(error=>{
                //   console.log(error.response)
                //     if(error.response.status == '401'){
                //       this.$router.push('/login')
                //       //retdirect login page
                //     }else if(error.resquest){
                //         console.log(error.request)
                //     }
                //     // console.log('hay')
                // });



        }
      },

      mounted(){
        this.fetchData()
      }

    }
</script>
