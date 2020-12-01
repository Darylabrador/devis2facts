import apiDevis from '../service/ApiDevis.js';
import Axios from "axios";
import { apiService } from "../_services/apiService";
import deleteDevis from '../components/modal/DeleteDevis'
import { authenticationService } from '../_services/authentication.service.js';

export default {
    components: {
        deleteDevis,
    },


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

                { text: 'Devis acceptés', value: 'is_accepted' },
                { text: '', value: 'carbs' },
            ],
        }
    },

    methods: {

        delDevis(e) {
            const refreshDeleteData = this.info.filter(element => element.id != e.id);
            this.info = refreshDeleteData;
        },


        getlistDevis: async function() {
            var res = await apiDevis.getAllDevis()

            this.info = res.data.data
        },

        format(filename) {
            var  data = filename.split('.')
            return data[0]
        },

        async generateFile(id, isFacture) {
            if (isFacture) {
                try {
                    const devis = await Axios.get(`/api/devis/pdf/${id}`, { responseType: 'arraybuffer' });
                    const file = await Axios.get(`/api/devis/pdf/name/${id}`);
                    const responseData = devis.data;
                    const fileData = file.data.data;
                    this.downloadPDF(responseData, fileData);
                } catch (error) {
                    console.log(error)
                }
            } else {
                try {
                    const facture = await Axios.get(`/api/facture/pdf/${id}`, { responseType: 'arraybuffer' });
                    const fileInfo = await Axios.get(`/api/facture/pdf/name/${id}`);
                    const responseDataFacture = facture.data;
                    const fileDataInfo = fileInfo.data.data;
                    this.downloadPDF(responseDataFacture, fileDataInfo);
                } catch (error) {
                    console.log(error)
                }
            }
        },

        async generateEmail(id) {
            const sendMail = await apiService.get(`/api/devis/sendemailpdf/${id}`);
            console.log(sendMail)
        },

        downloadPDF(responseData, fileData) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(new Blob([responseData], { type: 'application/pdf' }));
            a.href = url;
            a.download = fileData.filename;
            a.click();
            window.URL.revokeObjectURL(url);
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
    },

}