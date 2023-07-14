import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/create',
      name: 'create',
      component: () => import('../views/CreateView.vue')
    },
    {
      path: '/profit',
      name: 'profit',
      component: () => import('../views/ProfitView.vue')
    },
    {
      path: '/create.user',
      name: 'create.user',
      component: () => import('../views/users/CreateView.vue')
    },
    {
    path: '/users',
    name: 'users',
    component: () => import('../views/users/HomeView.vue')
}
  ]
})

export default router
