import Axios from "axios"

export default {
    data() {
        return {
            dialog: false,
            selectProduct: {},
            valid: false,
            products: [],
            description: '',
            descriptionRules: [
                v => !!v || "La description est requis",
            ],
            quantity: '',
            nombreRules: [
                v => !!v || "La champs est requis",
                v => !isNaN(parseFloat(v)) || "Ce champ doit être un nombre"
            ],
            price: '',

        }
    },

    created() {
        this.getProduct();
    },

    methods: {
        getProduct() {
            Axios.get('/api/products/getAll').then(({ data }) => {
                data.data.forEach(product => {
                    this.products.push(product)
                })

            })
        },
        addLigne() {
            let data = {
                product_id: this.selectProduct.id,
                description: this.description,
                quantity: this.quantity,
                devis_id: this.$route.params.id,
                price: this.price
            }
            Axios.post('/api/lignedevis/create', data).then(({data}) => {
                this.$emit('addLigne', data.data)
                this.dialog = false
            })
        },
    }
}