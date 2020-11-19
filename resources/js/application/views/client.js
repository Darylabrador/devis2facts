import Axios from "axios";
import AddClient from '../components/AddClient.vue'

export default {

    components: {
        AddClient
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
        }
    },
}