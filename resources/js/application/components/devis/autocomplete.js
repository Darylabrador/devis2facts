import Axios from "axios"

export default {
    data() {
        return {
            query: '',
            select: [],
            search: null,
            loading: false,
            listClients: [],
            id_client: '',
            no_data: false,
        }
    },

    watch: {
        search: function (val) {
            if (val && val.length >= 3) {

                this.loading = true
                Axios.get('/api/devis/clients', { query: val })
                    .then(data => {
                        data.data.forEach(client => {
                            this.loading = false;
                            this.listClients.push(client)
                        })

                    });
            }
        },
    },

    methods: {
        getClient() {
            console.log(this.select)
            this.$emit
        }
    }
}