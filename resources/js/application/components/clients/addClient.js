import Axios from "axios"

export default {
    props: {
        isModifier: {
            default: false
        },
        client: {
            default: function () {
                return {}
            }
        }
    },

    data() {
        return {
            drawerRight: null,
            email: '',
            emailRules: [
                v => !!v || "E-mail requis",
                v => /.+@.+\..+/.test(v) || "Ce champ doit être un email"
            ],
            name: '',
            nameRules: [
                v => !!v || "Le nom est requis",
            ],
            address: '',
            addressRules: [
                v => !!v || "L'addresse est requis",
            ],
            city: '',
            cityRules: [
                v => !!v || "La ville est requis",
            ],
            postcode: 0,
            postRules: [
                v => !!v || "Le code postal est requis",
            ],
            id: '',
            valid: true,
            lazy: false,
        }
    },

    methods: {
        addClient() {
            let data = { 
                name: this.name, 
                email: this.email, 
                city: this.city,
                postcode: this.postcode,
                address: this.address,
                id: this.id == '' ? '' : this.id 
            }
            Axios.post('/api/clients/add', data).then(data => {

                if (this.isModifier) {
                    this.$emit('updateClient', data.data)

                } else if (!this.isModifier) {
                    this.$emit('addClient', data.data);
                }
            })
        },


        update(client) {
            this.id = client.id;
            this.name = client.name;
            this.email = client.email;
        }
    },

}