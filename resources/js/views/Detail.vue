<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Compose</div>

                    <div class="card-body">
                      Detail {{id}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {bus} from '../app'

export default {
  data(){

    return{
      id:''
    }

  },

  methods:{



  },

  created(){
    bus.$on('detail',(mail)=>{

      console.log('D'+mail);
    })
  },

  mounted(){
    // this.fetchData()
  }

}
</script>
