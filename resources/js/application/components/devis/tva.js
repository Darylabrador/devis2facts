import Axios from "axios"

export default {
    data() {
        return {
            devis: [],
            tva: '',
        }
    },
    
    created() {
        this.getDevis();
    },
    
    methods: {  
        getDevis() {
            Axios.get("/api/devis/getAll").then(({data}) => {
                this.devis = data.data
            })
        }
    }
}