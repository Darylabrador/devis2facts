import Axios from "axios"
import addProduct from "../modal/AddProduct.vue"

export default {
    components: {
        addProduct,
    },
    props: {
        ligne: {
            type: Object,
        },
        isModified: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            id: null,
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
        if (this.isModified) {
            this.selectProduct = this.ligne.product
            this.quantity = this.ligne.quantity
            this.price = this.ligne.price
            this.description = this.ligne.description
            this.id = this.ligne.id
        }
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
                price: this.price,
                id: this.id == '' ? '' : this.id
            }

            Axios.post('/api/lignedevis/create', data).then(({ data }) => {
                if (this.isModified) {
                    // console.log(data.data.product)
                    this.dialog = false
                    this.ligne.product = data.data.product
                    this.ligne.quantity = data.data.quantity
                    this.ligne.price = data.data.price
                    this.ligne.description = data.data.description

                } else if (!this.isModified) {
                    this.$emit('addLigne', data.data);
                    this.dialog = false
                }
            })
        },
        add(produit) {
            //this.products = produit
            // console.log(produit)
            this.products.push(produit)
            this.selectProduct = produit
            this.quantity = 1
            this.price = produit.default_price
        },
    },
    computed: {

    },
}