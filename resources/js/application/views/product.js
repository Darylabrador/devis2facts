import apiProduct from "../service/ApiProduct.js"
import addProduct from "../components/modal/AddProduct.vue"
import deleteProductModal from "../components/modal/DeleteProduct.vue"

export default {

    components: {
        addProduct,
        deleteProductModal
    },

    data() {
        return {
            products: [],
            icons: 'mdi-delete',

        }
    },

    created() {
        this.getProducts();
    },

    methods: {
        getProducts: async function() {
            var res = await apiProduct.getProducts()
            this.products = res.data.data
        },

        add(product) {
            console.log(product);
            this.products.push(product);
        },

        deleteProd(index) {
            //console.log(index)
            if (index == 0) {
                this.products.splice(0, 1)
            } else {
                this.products.splice(index, index)
            }
        }
    },
}
