import { authenticationService } from "../_services/authentication.service";
import router from "../router.js"
export default {
    name: "Navbar",
    data() {
        return {
            appTitle: 'Awesome App',
            sidebar: false,
            currentUser: null,
            sheet: false,
            menuItems: [
                { title: 'Accueil', path: '/' },
                { title: 'Clients', path: '/clients' },
                { title: 'Devis', path: '/listdevis' },
                { title: 'Produits', path: '/produits' }
            ]
        }
    },

    computed: {
        isChecked() {
          return this.currentUser;
        },
    },

    methods: {
        logout() {
            authenticationService.logout();
            this.sheet = !this.sheet
            router.push("/login");
            
        },
        show: function () {
            this.isDisplay = true;
        },
        hide: function () {
            this.isDisplay = false;
        }
    },


  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
  }
};

