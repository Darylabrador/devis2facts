import api from './api'

//collection of request to API for product
export default {
    create(data) {
        return api.post('products/add', data)
    },
    getProducts() {
        return api.get('products/getAll')
    },
    deleteProduct(data) {
        return api.post('products/delete', data)
    }
}
