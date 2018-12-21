<template>

	<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h2>Login</h2>
					<hr>
					<form @submit.prevent='submit()'>


					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" class="form-control" v-model="credentials.email" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" v-model="credentials.password" name="password" id="password" placeholder="Password">
					  </div>
					  <div class="form-check">
					  	<button type="submit" class="btn btn-primary">Login</button>
					  	<a href="/register" class="btn btn-secondary active" role="button" aria-pressed="true">Register</a>
					  </div>
					</form>
				</div>
			</div>
		</div>

</template>

<script>

export default{

	data(){

		return{
				credentials:{
		                    email:'',
		                    password:''
		                },
	        	token:localStorage.getItem('access_token') ||null
		}

	},
	methods:{
		submit(){
			var credentials = {
                    email: this.credentials.email,
                    password: this.credentials.password
                }
			axios.post('/api/login',credentials)
				.then(({data}) => {
					this.token = data.data.token
					localStorage.setItem('access_token', this.token)
					this.$emit('set_token',this.token)
					this.$router.push('/')
				}).catch(error=>{
						if(error.response){
								console.log(error.response.data)
						}else if(error.resquest){
								console.log(error.request)
						}
				})
		}
	}

}

</script>
