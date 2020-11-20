import api from './api'

//collection of request to API for product
export default {
    getAllDevis() {
        return api.get('devis/getAll')
    },
}