import Axios from "axios"

export default {

    data() {
        return {


            drawer: null,
        items: [
          { title: 'Home', icon: 'mdi-view-dashboard' },
          { title: 'About', icon: 'mdi-forum' },
        ],
        }
    },

    methods: {
        addDevis() {
            Axios.post('/api/devis/add', {client_id: XXX, filename:XXX, remise: XXX, tva: XXX }).then(data => {
            
            })
        },
    },

}