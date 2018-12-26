<template>
    <div class="container">
      <button type="button" name="button" @click="fetchData">Refresh</button>
        <div class="row justify-content-center">
            <div class="col-md-8">
              <!-- search -->
              <form @submit.prevent='search' class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="form-control btn btn-outline-success" type="submit">Search</button>
              </form>
              <br>
              <br>
                <div class="card card-default">
                    <div class="card-header">{{title}}</div>

                    <div class="card-body">


                        <table class="table">
                          <tbody>
                            <tr v-for="mail,index in mails">
                              <td>
                                <router-link class="nav-link" to='/about'>
                                  {{mail.user.email}}
                                </router-link>
                              </td>
                              <td>{{mail.body}}</td>
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
            mails:''
        }

      },

      methods:{
        fetchData(){
            axios.get('/api/inbox')
            .then((response) =>{
                  this.mails = response.data;
              })
        },

        search(){
          alert('search')
        }

      },

      mounted(){
        this.fetchData()
      }

    }
</script>
