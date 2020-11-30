import Axios from "axios"

export default {

    data() {
        return {
            dialog: false,
            notifications: false,
            sound: true,
            widgets: false,
        }
    },

    methods: {
        addDevis() {
            Axios.post('/api/devis/add', {name: this.name, email:this.email, id: this.id == '' ? '' : this.id}).then(data => {
            })
        },
    },

}