import Axios from "axios"

export default {
    data() {
        return {
            dialog: false,
        }
    },

    props :{
        client : {
            default: function(){
                return {}
            }
        } ,
     //['client']
    },

    created(){
        console.log(this.client);
    },

    methods: {
        delClient() {
            Axios.post('/api/clients/del', {id: this.id}).then(data => {
                this.$emit('delClient', data.data);
            })
        }
    },

}