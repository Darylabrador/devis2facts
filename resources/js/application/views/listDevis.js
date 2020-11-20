import apiDevis from '../service/ApiDevis.js'

export default {
    data() {
        return {
            info: [],
            listDevis: [],
            search: '',
            headers: [{
                    text: 'N* de la facture',
                    align: 'start',
                    value: 'filename'
                },
                { text: 'Nom du Client', value: 'client.name' },

                { text: 'is_accepted', value: 'is_accepted' },
                { text: '', value: 'carbs' },
            ],
        }
    },

    methods: {
        getlistDevis: async function() {
            var res = await apiDevis.getAllDevis()
            this.info = res.data.data
        },
        format(filename) {
            var  data = filename.split('.')

            return data[0]
        }
    },

    created() {
        this.getlistDevis()
    },

    computed: {
        filteredInfo: function() {
            return this.info.filter((devis) => {
                return devis.filename.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }

}