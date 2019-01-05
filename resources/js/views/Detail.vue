<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Detail</div>

                    <div class="card-body">
                      From: {{mail.from_email}}
                      <br>
                      To: {{mail.to_email}}
                      <br>
                      {{moment(mail.send_date).fromNow()}}
                      <br>
                      Body: {{mail.body}}
                      <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

var moment = require('moment');

export default {
  props:['id'],
  data(){

    return{
      moment:moment,
      mail:''
    }

  },

  methods:{

    fetchData(){
      axios.post('/api/detail',{id:this.id})
      .then(response => {
        this.mail = response.data;
        console.log(this.mail);
      });
      console.log(this.id);
    }

  },

  created(){

  },

  mounted(){
    this.fetchData()
  }

}
</script>
