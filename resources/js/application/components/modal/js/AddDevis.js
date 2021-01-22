import Axios from "axios"

export default {

    data() {
        return {
            tva: 8.5,
            clients: [],
            selectedClient: 0,
            dateExp: '',
            devisFilename: '',
            devisLastId: 0,
            date: '',
            isAcompte: false,
            dialog: false,
            menu: false,
            modal: false,
            menu2: false,
        }
    },

    created() {
        this.getClients()
        this.initialize()
        this.getLastIdDevis()
    },

    methods: {
        formatDate(date) {
            if (!date) return null
            const [year, month, day] = date.split('-')
            let yearFormat = Number(year);
            yearFormat += 1;
            return `${day}/${month}/${yearFormat}`
        },
        parseDate(date) {
            if (!date) return null
            const [day, month, year] = date.split('/')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        },

        addDevis() {
            Axios.post('/api/devis/add', { is_acompte: this.isAcompte, client_id: this.selectedClient, filename: this.devisFilename, remise: 0, tva: this.tva, date_expiration: this.parseDate(this.dateExp) }).then(({data}) => {
                if (this.isAcompte) {
                    this.$router.push('devis/acompte/' + data.data.id);

                } else {
                    this.$router.push('devis/' + data.data.id);
                }
            })
        },

        initialize() {
            this.date = new Date();
            this.dateExp = this.formatDate(new Date().toISOString().substr(0, 10))
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
                this.devisFilename = 'DE-' + this.date.getFullYear() + '-' + this.date.getMonth() + '-' + (data.data.id + 1)
            })

        },
    },
}