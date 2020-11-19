                import Axios from "axios";


export default {

    data() {
        return {
            clients: [],
            icons: mdiDelete
        }
    },

    created() {
        this.getClients();
        //console.log("oui");
    },

    methods: {
        getClients() {
            Axios.get('api/clients/getAll').then(({ data }) => {

                console.log(data)
                data.data.forEach(client => {
                    this.clients.push(client)
                })
            })
        }
    },
}