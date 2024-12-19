//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import( /* webpackChunkName: "home" */
            '../views/home.vue')
    },
    {
        path: '/mobil',
        name: 'mobil.index',
        component: () => import( /* webpackChunkName: "index" */ '../views/mobil/index.vue')
    },
    {
        path: '/createMobil',
        name: 'mobil.create',
        component: () => import( /* webpackChunkName: "create" */'../views/mobil/create.vue')
    },
    {
        path: '/editMobil/:id',
        name: 'mobil.edit',
        component: () => import( /* webpackChunkName: "edit" */
            '../views/mobil/edit.vue')
    },
    {
        path: '/transaksi',
        name: 'transaksi.index',
        component: () => import( /* webpackChunkName: "index" */ '../views/transaksi/index.vue')
    },
    {
        path: '/createtransaksi',
        name: 'transaksi.create',
        component: () => import( /* webpackChunkName: "create" */'../views/transaksi/create.vue')
    },
    {
        path: '/edittransaksi/:id',
        name: 'transaksi.edit',
        component: () => import( /* webpackChunkName: "edit" */
            '../views/transaksi/edit.vue')
    }
]
//create router
const router = createRouter({
    history: createWebHistory(), routes // <-- routes,
})

export default router