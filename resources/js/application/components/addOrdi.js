import Axios from "axios"

export default {
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
            valid: true,
            lazy: false,
        }
    },

    methods: {
        addClient() {
            Axios.post('/api/clients/add', {name: this.name, email:this.email}).then(data => {
                this.$emit('addClient', data.data);
            })
        }
    },

}