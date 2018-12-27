<template>
    <div class="container">
      <button type="button" name="button" @click="fetchData">Refresh</button>
        <div class="row justify-content-center">
            <div class="col-md-8">
              <!-- search  -->
              <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" @keyup="searchit" v-model="search" type="search" placeholder="Search" aria-label="Search">
              <button class="form-control btn btn-outline-success" @click.prevent = "searchit">Search</button>
              </form>
              <br>
              <br>
                <div class="card card-default">
                    <div class="card-header">{{title}}</div>

                    <div class="card-body">


                        <table class="table">
                          <thead>
                            <tr>
                              <th>To</th>
                              <th>From</th>
                              <th>Body</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="mail,index in mails">
                              <td>{{mail.to_email}}</td>
                              <td>
                                <router-link class="nav-link" to='/about'>
                                  {{mail.user.email}}
                                </router-link>
                              </td>
                              <td>{{mail.body}}</td>
                              <td>{{mail.user_id}}</td>
                              <td>{{mail.is_read?'':'Unread'}}</td>
                              <td>{{mail.send_date}}</td>
                            </tr>
                          </tbody>
                        </table>



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
            mails:'',
            search:''
        }

      },

      methods:{
        fetchData(){
            axios.get('/api/inbox')
            .then((response) =>{
                  this.mails = response.data;
              })
        },


        searchit: _.debounce(function () {

            let query = this.search

            axios.get('/api/search?q=' + query)
                .then((response) => {
                  this.mails = response.data
                  console.log(response.data);
                })
            console.log(query);
          }, 1200)

      },

      mounted(){
        this.fetchData()
      }

    }
</script>
