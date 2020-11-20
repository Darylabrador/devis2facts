import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Dashboard.vue';
import Clients from './views/Client.vue';
import Devis from './views/Devis.vue';
import Products from './views/Product.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [{
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
            path: '/devis',
            name: 'devis',
            component: Devis
        },
        {
            path: '/products',
            name: 'product',
            component: Products
        }
    ]
});


export default router;
