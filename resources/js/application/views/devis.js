import Axios from "axios"
import Tva from '../components/devis/Tva.vue'
import Autocomplete from '../components/devis/Autocomplete.vue'
export default {
    components: {
        Tva,
        Autocomplete
    },


    data() {
        return {
            total: [],
            checkbox: false,
            tva: '',
            headers: [
                {
                    text: '',
                    align: 'start',
                    sortable: false,
                    value: 'actions',
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