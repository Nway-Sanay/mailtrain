import VueRouter from 'vue-router';

let routes =  new VueRouter({

	mode: 'history',

	routes:[
		{
			path:'/login',
			component:resolve => require(['./views/login'],resolve).default,
			meta:{
				layout : "no-nav",
				is_login : true
			}
		},

		{
			path:'/',
			component:resolve => require(['./views/Home'],resolve).default,
			meta:{requiresAuth : true}
		},

    {
        path:'/compose',
        component:resolve => require(['./views/Compose'],resolve).default,
        meta:{requiresAuth : true}
    },
// require(['./pages/Login'], resolve)
    {
        path:'/logout',
        component:resolve => require(['./views/logout'],resolve).default,
        meta:{requiresAuth : true}
    },


]})

routes.beforeEach((to, from, next) => {

	if (to.matched.some(record => record.meta.requiresAuth)) {
		if (localStorage.getItem('access_token') == null) {
            next({
                path: '/login',
                params: {nextUrl: to.fullPath}
            })
        }else{
        	next()
        }
	}
	else if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('access_token') != null) {
            next({
                path: '/',
                params: {nextUrl: to.fullPath}
            })
        }else{
            next()
        }
    }else if (to.matched.some(record => record.meta.is_login)) {
        if (localStorage.getItem('access_token') != null) {
            next({
                path: '/',
                params: {nextUrl: to.fullPath}
            })
        }else{
            next()
        }
    }
    next()
})

export default routes
