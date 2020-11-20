import Axios from "axios"

export default {
    data() {
        return {
            dialog: false,
        }
    },

    // You can use this props: ['client']
    
    props: {
        client: {
            default: function () {
                return {}
            }
        },

    },

    methods: {
        delClient() {
            Axios.delete('/api/clients/del/' + this.client.id).then(data => {
                this.$emit('delClient', data.data)

            })
        }
    }

}