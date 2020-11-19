import AddOrdi from '../components/AddOrdi.vue'
export default {
    components: {
        AddOrdi
    },
    data() {
        return {
            clients: []
        }
    },

    methods: {
        add(client) {
            this.clients.push(client.data);
        }
    }
}