import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/HomeView.vue')
        },{
            path: '/create',
            name: 'create',
        },{
            path: '/profit',
            name: 'profit',
            component: () => import('../views/ProfitView.vue')
        },{
            path: '/create.user',
            name: 'create.user',
            component: () => import('../views/users/CreateView.vue')
        },{
            path: '/users',
            name: 'users',
            component: () => import('../views/users/HomeView.vue')
        },{
            path: '/login',
            name: 'login',
            component: () => import('../views/users/LoginView.vue')
        },{
            path: '/personal',
            name: 'personal',
            component: () => import('../views/users/PersonalView.vue')
        },{
            path: '/:pathMatch(.*)*',
            name: 'not-found',
            component: () => import('../views/users/components/404View.vue')
        }
    ]
})

router.beforeEach((to, from,next) => {

    const accessToken = localStorage.getItem('access_token')


        if (!accessToken) {
            if (to.name === 'login' || to.name === 'create.user') {
            return next()
        } else {
                next({
                    name: 'login'
                })
            }
    }

    if (to.name === 'login' || to.name === 'create.user' && accessToken) {
            return next({
                name: 'personal'
        })
    }

    next()
})

export default router
