import Axios from "axios";
export default {

    
    props: {
        devis : {
            default: function () {
                return {}
            }
        },
        filename : {
            default: function () {
                return {}
            }
        }
    },
    data() {
        return {
            dialog: false,
        }
    },
    created(){
        
    },
    methods: {
        delDevis() {
            Axios.delete('/api/devis/del/' + this.devis.id).then(data => {
                this.$emit('delDevis', data.data)
            })
        }
    },
}
