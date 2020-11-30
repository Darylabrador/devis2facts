import Axios from "axios"
import Tva from '../components/devis/Tva.vue'
import Autocomplete from '../components/devis/Autocomplete.vue'
import AddLigne from '../components/devis/AddLigne.vue'
import Facturation from '../components/devis/lignedevis/Facturation.vue'
import Check from '../components/devis/lignedevis/Check.vue'
import {apiService} from '../_services/apiService'
export default {
    components: {
        Tva,
        Autocomplete,
        AddLigne,
        Facturation,
        Check
    },


    data() {
        return {
            pourcentRule: [v => (!isNaN(parseFloat(v)) && v >= 0 && v <= 100) || 'Le nombre doit être compris entre 0 et 100'],
            total: [],
            tva: '',
            prix: [],
            headers: [
                {
                    text: 'Produit',
                    align: 'start',
                    sortable: false,
                    value: 'product.name',
                },
                { text: 'Quantité', value: 'quantity' },
                { text: 'Description', value: 'description' },
                { text: 'Prix Unitaire HT', value: 'price' },
                { text: 'Total', value: 'total' },
                { text: '', value: 'check' },

            ],
            lignes: [],
            tht: 0,
            ttc: 0,

            valuetht: 0,
            valuettc: 0,

            remise: 0,
            creation: '',
            expiration: '',
            factures: [],
            drawerRight: false,
            isFacture: false,
            verifCheck: false,
            valid: true,

        }
    },
    created() {
        this.getLigne()
        this.getDevis()


    },
    methods: {
        getLigne() {
            apiService.get('/api/devis/find/ligne/' + this.$route.params.id).then(({ data }) => {

                data.data.forEach(ligne => {
                    this.lignes.push(ligne)
                    this.tht += ligne.price * ligne.quantity
                    this.ttc += (ligne.price + ligne.price * ligne.devis.tva / 100) * ligne.quantity

                })
                this.valuetht = this.tht
                this.valuettc = this.ttc

            })



        },

        getDevis() {
            Axios.get('/api/devis/find/' + this.$route.params.id).then(({ data }) => {
                this.creation = data.data.creation
                this.expiration = data.data.expiration
                this.remise = data.data.remise
                
            })
            
        },



        add(ligne) {
            this.lignes.push(ligne)
            this.tht += ligne.price * ligne.quantity
            this.ttc += (ligne.price + ligne.price * ligne.devis.tva / 100) * ligne.quantity

            this.valuetht = this.tht
            this.valuettc = this.ttc
        },



        emis(value) {

            this.valuettc = this.ttc - this.ttc*value/100
            this.valuetht = this.tht- this.tht*value/100


            Axios.get('/api/devis/up/remise/' + this.$route.params.id +'/' + this.remise).then(({ data }) => {
               // console.log('/api/devis/up/remise/' + this.$route.params.id +'/' + this.remise)
            })
        },

        isFact() {
            this.checkbox = !this.checkbox;
            this.isFacture = !this.isFacture;
            this.verifCheck = true;
            this.valid = !this.valid;
            this.drawerRight = !this.drawerRight;

        },

        createFacture(facture) {
            this.factures.push(facture);
        }

    }
}