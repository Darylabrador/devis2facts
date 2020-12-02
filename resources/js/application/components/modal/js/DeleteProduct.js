import Axios from 'axios'

export default {
    props: {
        product: {
            type: Object,
            default: () => [{ id: null }],
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
        deleteProduct: function() {
            var data = {
                id: this.product.id
            }
            Axios.post("/api/products/delete/", data)
                .then(res => {
                    console.log(res)
                    this.$emit('deleteProduct', this.index)
                    this.dialog = false
                })
                .catch(err => {
                    console.error(err);
                })
        }
    },
}