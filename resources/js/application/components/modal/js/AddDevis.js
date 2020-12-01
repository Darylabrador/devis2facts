import Axios from "axios"

export default {

    data() {
        return {
            tva:8.5,
            clients:[],
            selectedClient:0,
            dateExp:'',
            devisFilename:'',
            devisLastId:0,
            date: '',
            dialog: false,
        }
    },
    created() {
        this.getClients()
        this.initialize()
        this.getLastIdDevis()

    },

    methods: {
        addDevis() {

            Axios.post('/api/devis/add', {client_id: this.selectedClient, filename: this.devisFilename, remise: 0, tva: this.tva, date_expiration: this.dateExp }).then(data => {
                this.$router.push('devis/'+data.data.data.id);

            })


            //creation pdf ici avec l'id

            
        },


        initialize(){
            this.date = new Date()
            this.dateExp= (this.date.getFullYear()+1) + '-' + this.date.getMonth() + '-' + this.date.getDay()
            
        },
        getClients() {
            Axios.get('api/clients/getAll').then(({ data }) => {

                data.data.forEach(client => {
                    this.clients.push(client)
                })

            })
        },
        getLastIdDevis() {
            Axios.get('api/devis/lastIdDevis').then(({ data }) => {
                //this.devisLastId = data.data.id
                this.devisFilename = 'DE-'+this.date.getFullYear()+'-'+this.date.getMonth() + '-' + (data.data.id+1)
            })
            
        },


    },

}