import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Dashboard.vue';
import Clients from './views/Client.vue';
import Devis from './views/Devis.vue';
import listDevis from './views/ListDevis.vue';
import Products from './views/Product.vue';

// route temporaire pour la génération du pdf
import GeneratePdf from './views/GeneratePDF.vue';

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
            path: '/devis/:id',
            name: 'devis',
            component: Devis
        },
        {
            path: '/listdevis',
            name: 'listDevis',
            component: listDevis
        },
        {
            path: '/produits',
            name: 'product',
            component: Products
        },
        {
            path: '/generate',
            name: 'pdf',
            component: GeneratePdf
        }
    ]
});


export default router;