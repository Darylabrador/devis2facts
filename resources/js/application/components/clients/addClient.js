import Axios from "axios"

export default {
    props: {
        isModifier: {
            default: false
        },
        client: {
            default: function() {
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
            id: '',
            valid: true,
            lazy: false,
        }
    },

    methods: {
        addClient() {
            Axios.post('/api/clients/add', {name: this.name, email:this.email, id: this.id == '' ? '' : this.id}).then(data => {
                
                if (this.isModifier) {
                    this.$emit('updateClient', data.data)
               
                } else if(!this.isModifier) {
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