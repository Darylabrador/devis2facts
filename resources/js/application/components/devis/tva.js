import Axios from "axios"
import { apiService } from "../../_services/apiService";

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
            apiService.get("/api/devis/find/1").then(({data}) => {
                this.devis.push(data.data);
            })
        }
    }
}