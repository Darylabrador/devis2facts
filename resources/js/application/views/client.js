import Axios from "axios";

export default {
    components: {

    },
    data() {
        return {
            clients: [],
        }
    },

    created() {
        //this.getClients();
    },

    methods: {
        getClients() {
            Axios.get('api/client').then(({ data }) => {

                console.log(data);
                // data.data.forEach(client => {
                //     this.ordinateurs.push(ordinateur)
                // })
                
            })
        },

        getDate(date) {
            this.date = date;
        }
    }
}