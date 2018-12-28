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

                      <div class="" style="float:left">
                        <datetime format="YYYY/MM/DD" width="300px" v-model="from_date"></datetime>
                        {{from_date}}
                      </div>
                      <div class="" style="float:right">
                        <datetime format="YYYY/MM/DD" width="300px" v-model="to_date" ></datetime>
                        {{to_date}}
                      </div>
                      <button class="form-control btn btn-outline-success" @click= "date_search">Search</button>

                        <table class="table">
                          <thead>
                            <tr>
                              <th>To</th>
                              <th>From</th>
                              <th>Body</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="mail,index in mails.data">
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
                      <div class="card-footer">
                        <pagination :data="mails" :show-disabled="true" :limit='1' @pagination-change-page="getResults"></pagination>
                      </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import datetime from 'vuejs-datetimepicker';

    const CancelToken =  axios.CancelToken;
    let cancel;

    export default {

      components: { datetime },

      data(){

        return{
            title:"Inbox",
            mails:{},
            search:'',
            from_date:'',
            to_date:''
        }

      },

      methods:{

        getResults(page = 1) {
          let api = ''

          if (this.search) {
            api = 'api/search?q='+this.search+'&page='

            axios.get(api + page)
      				.then(response => {
      					this.mails = response.data;
                console.log(response.data.path+" "+this.$route.toPath);
      				});
          }else {

            axios.get('api/inbox?page=' + page)
            .then(response => {
              this.mails = response.data;
              console.log(response.data.path+" "+this.$route.toPath);
            });
          }
      		},

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
          }, 1200),

          date_search(){
            axios.post('/api/date_search',{
              from_date : this.from_date,
              to_date : this.to_date
            }).then((response) =>{
                  this.mails = response.data;
                  console.log(response.data);
              })
            console.log(this.from_date+" "+this.to_date);
          }

      },

      mounted(){
        this.fetchData()
      }

    }
</script>
