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
                        <datetime format="YYYY/MM/DD" width="200px" v-model="from_date"></datetime>
                      </div>
                      <div class="" style="float:right">
                        <datetime format="YYYY/MM/DD" width="200px" v-model="to_date" ></datetime>
                      </div>
                      <button class="form-control btn btn-outline-success" @click= "date_search">Search</button>

                        <table class="table">
                          <thead>
                            <tr>
                              <th>From</th>
                              <th>Body</th>
                              <th>user_id</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr style="cursor: pointer" @click='detail(mail.id)' v-for="mail,index in mails.data">
                              <td>
                                <!-- <router-link class="nav-link" to='/detail'> -->
                                  {{mail.from_email}}
                                <!-- </router-link> -->
                              </td>
                              <td>{{mail.body_cut}}</td>
                              <td>{{mail.user_id}}</td>
                              <td>{{mail.is_read?'':'Unread'}}</td>
                              <td>{{moment(mail.send_date).fromNow()}}</td>
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

    var moment = require('moment');

    import datetime from 'vuejs-datetimepicker';

    import {bus} from '../app'

    export default {

      components: { datetime },

      data(){

        return{
            moment:moment,
            title:"Inbox",
            mails:{},
            search:'',
            from_date:'',
            to_date:'',
            id:''
        }

      },

      methods:{



        getResults(page = 1) {
          let api = ''

          if (this.search) {
            api = 'api/search?q='+this.search+'&page='

            axios.get(api)
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
          },

          detail(id){

            this.$router.push({name:'mail.detail', params: { id:id }})
            bus.$emit('detail',this.mail)
            // console.log(id);
          }

      },

      mounted(){
        this.fetchData()
      }

    }
</script>
