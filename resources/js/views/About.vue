<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">About Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const CancelToken =  axios.CancelToken;
let cancel;

export default {
  data(){

    return{
        title:"Inbox",
        mails:''
    }

  },

  methods:{
    fetchData(){
        axios.get('/api/about',{

          cancelToken: new CancelToken(function executor(c) {
            cancel = c;

          })

        }).then((response) =>{
            console.log(cancel);
          })




    }
  },

  mounted(){
    this.fetchData()
  }

}
</script>
