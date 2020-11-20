import Axios from "axios";
import AddClient from '../components/clients/AddClient.vue'
import DelClient from '../components/DelClient.vue'

export default {

    components: {
        AddClient,
        DelClient,
    },

    data() {
        return {
            clients: [],
            icons: 'mdi-delete',
        }
    },

    created() {
        this.getClients();
        //console.log("oui");
    },

    methods: {
        getClients() {
            Axios.get('api/clients/getAll').then(({ data }) => {

                data.data.forEach(client => {
                    this.clients.push(client)
                })
            })
        },

        add(client) {
            console.log(client);
            this.clients.push(client.data);
        },
        del(){
            Axios.post('/api/clients/del', {name: this.name, email:this.email}).then(data => {
                this.$emit('addClient', data.data);
            })
        }
    },
}