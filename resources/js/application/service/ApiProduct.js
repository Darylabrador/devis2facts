import api from './api'

//collection of request to API for product
export default {
    create(data) {
        return api.post('products/add', data)
    },
}
