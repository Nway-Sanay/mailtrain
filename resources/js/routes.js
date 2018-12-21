import VueRouter from 'vue-router';

let routes =  new VueRouter({

	mode: 'history',

	routes:[

	{
		path:'/',
		component:require('./views/Home').default,
		meta:{requiresAuth : true}
	},

    {
        path:'/about',
        component:require('./views/About').default,
        meta:{requiresAuth : true}
    },

    {
        path:'/logout',
        component:require('./views/logout').default,
        meta:{requiresAuth : true}
    },

	{
		path:'/login',
		component:require('./views/login').default,
		meta:{
            layout : "no-nav",
            is_login : true
        }
	}

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
	}else if (to.matched.some(record => record.meta.requiresAuth)) {
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
