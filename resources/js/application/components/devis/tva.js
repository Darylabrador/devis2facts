import Axios from "axios"

export default {
    data() {
        return {
        devis: [],
        tva: {}
        }
    },
    
    created() {
        this.getDevis();
    },
    
    methods: {
        getDevis() {
            Axios.get("/api/devis/find/1").then(({data}) => {
                this.devis.push(data.data);
            })
        }
    }
}