import Axios from "axios"
import Tva from '../components/devis/Tva.vue'
import Autocomplete from '../components/devis/Autocomplete.vue'
import AddLigne from '../components/devis/AddLigne.vue'
export default {
    components: {
        Tva,
        Autocomplete,
        AddLigne
    },


    data() {
        return {
            pourcentRule: [v => (!isNaN(parseFloat(v)) && v >= 0 && v <= 100) || 'Le nombre doit être compris entre 0 et 100'],
            total: [],
            checkbox: false,
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
            ttc:0,

            valuetht:0,
            valuettc:0,

            remise:0,
            creation: '',
            expiration: '',

        }
    },
    created() {
        this.getLigne()
        this.getDevis()
        
        
    },
    methods: {
        getLigne() {
            Axios.get('/api/devis/find/ligne/' + this.$route.params.id).then(({ data }) => {

                data.data.forEach(ligne => {
                    this.lignes.push(ligne)
                    this.tht += ligne.price * ligne.quantity
                    this.ttc += ( ligne.price + ligne.price * ligne.devis.tva / 100 ) * ligne.quantity
                    
                })
                this.valuetht = this.tht
                this.valuettc = this.ttc

            })

           
                
        },

        getDevis() {
            Axios.get('/api/devis/find/' + this.$route.params.id).then(({ data }) => {
                this.creation = data.data.creation
                this.expiration = data.data.expiration
            })
        },

        add(ligne) {
            this.lignes.push(ligne)
            this.tht += ligne.price * ligne.quantity
            this.ttc += ( ligne.price + ligne.price * ligne.devis.tva / 100 ) * ligne.quantity

            this.valuetht = this.tht
            this.valuettc = this.ttc
        },

        emis(value) {

            this.valuetht = this.ttc*value/100
            this.valuettc = this.tht*value/100
        }

    }
}