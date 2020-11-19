import Axios from "axios"
import ModalAddProduct from "../components/modal/AddProduct.vue"

export default {
    created() {
        console.log(Axios)
    },
    components: {
        ModalAddProduct
    }
}