<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Compose</div>

                    <div class="card-body">
                      <form >

                        <div class="form-group">
                          <label for="email">To Email address</label>
                          <input type="email" v-validate="'required'" v-model="mail.to_email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                          <br v-if="errors.has('email')">
                          <span class="alert alert-danger" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                        </div>
                        <div class="form-group">
                          <label for="body">Body</label>
                          <textarea class="form-control" v-validate="'required'" v-model="mail.body" name='body' id="body" placeholder="type something...."></textarea>
                          <br v-if="errors.has('body')">
                          <span class="alert alert-danger" v-if="errors.has('body')">{{ errors.first('body') }}</span>
                        </div>
                        <div class="form-group">
                          <input type="file" id="attach_file" name="attach_file">
                        </div>
                        <div class="form-check">
                          <button type="submit" @click.prevent='send' name="save" class="btn btn-primary">Send</button>
                          <button @click.prevent='draft' name="draft" class="btn btn-primary">Save as draft</button>
                        </div>
                      </form>
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
        mail:{
          'to_email':'',
          'body':''
        }
    }

  },

  methods:{
    // fetchData(){
    //     axios.post('/api/compose',{
    //
    //     }).then((response) =>{
    //         console.log(response);
    //       })

    send(){

      this.$validator.validateAll().then(() => {
        console.log('Validator');
      }).catch(() => {
        alert(this.errors.all())
      })

      // axios.post('/api/compose',this.$data.mail)
      // .then((response) =>{
      //         console.log(response);
      //       })

      // console.log('Send methods');
    },


    draft(){
      console.log('daft');
    }



  },

  mounted(){
    // this.fetchData()
  }

}
</script>
