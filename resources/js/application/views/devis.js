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
            total: [],
            checkbox: false,
            tva: '',
            headers: [
                {
                    text: 'Produit',
                    align: 'start',
                    sortable: false,
                    value: 'product.name',
                },
                { text: 'Quantité', value: 'quantity' },
                { text: 'Prix Unitaire HT', value: 'price' },
                { text: 'Total', value: 'total' },
                { text: '', value: 'check' },

            ],
            ligne: [],
        }
    },
    created() {
        this.getLigne();
    },
    methods: {
        getLigne() {
            Axios.get('/api/devis/find/ligne/1').then(({ data }) => {
                data.data.forEach(ligne => {
                    this.ligne.push(ligne);
                })


            })
        },

    }
}