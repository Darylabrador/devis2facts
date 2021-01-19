import Axios from "axios";
import { apiService } from "../../../_services/apiService";

export default {

  data() {
    return {
      sheet: false,
      pourcent: 100,
      result: 0,
      devis: {}
    }
  },

  created() {
    this.init()
  },

  methods: {
    calcul() {
      this.result = (this.pourcent / 100 * this.devis.ttc).toFixed(2);
    },

    init() {
      apiService.get('/api/devis/find/' + this.$route.params.id).then(({data}) =>  {
        this.devis = data.data;
        this.result = this.devis.ttc;
      
      })
      

    },
    facturer() {
      this.calcul();
      this.$emit('ligneAcompte', this.result);
     this.sheet = false; 
    }
  }
}