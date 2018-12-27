import router from './routes';



    axios.interceptors.response.use(function (response) {
      // Do something with response data

      if (typeof response.data != 'object' ) {
        console.log('Ooops! Something went wrong.');
      }
      // else {
      //   console.log(response.data);
      // }

      // console.log(response.data)
      return response;
    },
    // Do something with response error
    function (error) {


        if (error.response.status == 401) {

          router.push('login')
          console.log('Unauthorized User');
        }



      // if (error.response.status === 405) {
      //   console.log('not post');
      //
      // }
      // console.log(error.response)

      return Promise.reject(error);
    });

    // request interceptor

    axios.interceptors.request.use(function (config) {
    // Do something before request is sent

    var token = localStorage.getItem('access_token')

    if (token != null) {

       // Authorization: `Bearer ${this.$store.state.token}`

      // config.headers.Authorization = `Bearer ${token}`;
      // console.log(`Bearer ${localStorage.getItem('access_token')}`);
      config.headers['Content-Type'] = 'application/json';
      config.headers['Accept'] = 'application/json';
       config.headers['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`;
      // console.log(token)
    }
    return config;
  }, function (error) {
    // Do something with request error
    // console.log('axios_intercept_request_error'+error.response.data);
    return Promise.reject(error);
  });
