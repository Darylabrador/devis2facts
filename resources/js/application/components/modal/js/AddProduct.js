import { defaults } from 'lodash'
import apiProduct from '../../../service/ApiProduct'
export default {
    props: {
        product: {
            type: Object,
        },
        isModified: {
            type: Boolean,
            default: false
        }
    },

    data() {
        return {
            drawerRight: null,
            price: '',
            priceRules: [
                v => !!v || "le Prix est requis",
                v => !isNaN(parseFloat(v)) || "Ce champ doit être un nombre"
            ],
            name: '',
            nameRules: [
                v => !!v || "Un nom est requis",
            ],
            valid: true,
            lazy: false,
            title: "",
        }
    },

    methods: {
        addProduct: async function() {
            var data = {
                id: this.product.id,
                name: this.name,
                default_price: this.price
            }
            if (!this.isModified) {
                var res = await apiProduct.create(data)
                this.name = ""
                this.price = ""
                this.$emit('addProduct', res.data.product)
            } else {
                var res = await apiProduct.updateProduct(data)
                this.product.name = res.data.product.name
                this.product.default_price = res.data.product.default_price
            }
        },
    },
    created() {
        if (this.isModified) {
            this.name = this.product.name
            this.price = this.product.default_price
        }
    },

}