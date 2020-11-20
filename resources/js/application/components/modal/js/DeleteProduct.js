import apiProduct from '../../../service/ApiProduct'

export default {
    props: {
        product: {
            type: Object,
            default: () => [{ id: null, name: null, default_price: null }],
        },
        index: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            dialog: false,
            confirmation: "",
        }
    },
    methods: {
        deleteProduct: async function() {
            var data = {
                id: this.product.id
            }

            var res = await apiProduct.deleteProduct(data)

            this.$emit('deleteProduct', this.index)

            console.log(res)

            this.dialog = false
        }
    },
}
