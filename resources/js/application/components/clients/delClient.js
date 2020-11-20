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
        //console.log(this.client);
    },

    methods: {
        delClient() {
            //console.log("btn suppr with + ", this.client)
            Axios.delete('/api/clients/del/'+this.client.id).then(data => {
                this.$emit('delClient', data.data)
                
            })
        }
    }

}