import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Dashboard.vue';
import Clients from './views/Client.vue';
import Test from './views/Test.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/clients',
            name: 'clients',
            component: Clients
        },
        {
            path: '/test',
            name: 'test',
            component: Test
        }
    ]
});


export default router;