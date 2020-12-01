import Axios from "axios"

export default {

    data() {
        return {
            tva:8.5,
            clients:[],
            selectedClient:0,
            dateExp:'',
            devisLastId:0,
            date: '',
            dialog: false,
        }
    },
    created() {
        this.getClients()
        this.initialize()

    },

    methods: {
        addDevis() {

            //creation pdf et recuperation filename a mettre ici

            console.log('id:' + this.selectedClient + ' filename:' + this.date.getFullYear()+'-'+this.date.getMonth() + '-LastId remise:0 tva:'+this.tva+' date_expiration:'+this.dateExp);
            // Axios.post('/api/devis/add', {client_id: clients[i].id, filename:XXX, remise: 0, tva: XXX }).then(data => {
            
            // })
            //creation pdf ici avec l'id
        },
        initialize(){
            this.date = new Date()
            this.dateExp=this.date.getFullYear()+1 + '-' + this.date.getMonth() + '-' + this.date.getDay()
            
        },
        getClients() {
            Axios.get('api/clients/getAll').then(({ data }) => {

                data.data.forEach(client => {
                    this.clients.push(client)
                })
            })
        },
    },

}