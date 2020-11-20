import Axios from "axios";
import { update } from "lodash";
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
            isModifier: false
        }
    },

    created() {
        this.getClients();
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
            this.clients.push(client.data);
        },
        del(){
            Axios.post('/api/clients/del', {name: this.name, email:this.email}).then(data => {
                this.$emit('addClient', data.data);
            })
        },
        update(client) {
            const index = _.findIndex(this.clients, { id: client.data.id });
            this.clients.splice(index, 1, client.data);
        }
    },
}