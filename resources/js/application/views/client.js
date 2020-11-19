//import Axios from "axios";

export default {
    components: {

    },
    data() {
        return {
            nom: 'toto',
        }
    },

    created() {
        this.getClients();
    },

    methods: {
        getClients() {
            Axios.get('api/client').then(({ data }) => {
                data.data.forEach(ordinateur => {
                    this.ordinateurs.push(ordinateur)
                })
            })
        },

        add(ordi) {
            const index = _.findIndex(this.ordinateurs, { id: ordi.id });
            this.ordinateurs.push(ordi);
        },

        getDate(date) {
            this.date = date;
        }
    }
}