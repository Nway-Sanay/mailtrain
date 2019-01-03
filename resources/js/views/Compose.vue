<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Compose</div>

                    <div class="card-body">
                      <form @submit.prevent="send">

                        <div class="form-group">
                          <label for="email">To Email address</label>
                          <input type="email" v-validate="'required|email'" v-model="mail.email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
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
                          <input type="file" @change="select_file">
                        </div>
                        <div class="form-check">
                          <button type="submit" name="save" class="btn btn-primary">Send</button>
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

export default {
  data(){

    return{
        title:"Inbox",
        mail:{
          'email':'',
          'body':'',
          'attach_file':null
        },
        form : new FormData
    }

  },

  methods:{

    select_file(event){
      console.log(event)
      this.mail.attach_file = event.target.files[0]
    },

    send(){
      this.form.append('email',this.mail.email)
      this.form.append('body',this.mail.body)

      if (this.mail.attach_file) {
        this.form.append('attach_file',this.mail.attach_file)
      }

      let config = {headers : {'Content-Type' : 'multipart/form-data'}}

      // axios.post('/api/compose',this.form,config)
      //       .then((response) =>{
      //               console.log(response);
      //             })

      this.$validator.validateAll().then(valid =>
        {
          if(valid){
            axios.post('/api/compose',this.form,config)
                  .then((response) =>{
                          console.log(response);
                          this.$router.push('/')
                        })
          }
        })
      .catch(() => {
        alert(this.errors.all())
      })

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
