export default {
    name: "Navbar",
    data() {
        return {
            appTitle: 'Awesome App',
            sidebar: false,
            menuItems: [
                {title: 'Accueil', path: '/'},
                {title: 'Clients', path: '/clients'},
                {title: 'Devis', path: '/listdevis'},
                {title: 'Produits', path: '/produits'},
                {title: 'Générer', path: '/generate'},
            ]
        }
    },
};

