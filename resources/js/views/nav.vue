<template>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">MailTrain</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
    		<router-link class="nav-link" to='/'>Home</router-link>
	      </li>
	      <li class="nav-item">
    		<router-link class="nav-link" to='/compose'>Compose</router-link>
	      </li>
	      <li class="nav-item">
    		 <router-link class="nav-link" to='/logout'>Logout</router-link>
	      </li>
				<li class="nav-item">
    		 <span class="nav-link">{{user_name}}</span>
	      </li>
	    </ul>
	  </div>
	</nav>

</template>

<script>
	export default{
		data(){

			return{
				user_name:''
			}

		},

		methods:{

			getUserName(){

				axios.get('/api/user')
				.then((response) => {
					this.user_name = response.data
					console.log(response.data);
				})

			}

		},

		mounted(){
			this.getUserName()
		}


	}
</script>
