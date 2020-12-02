import Axios from "axios";
import { authenticationService } from '../_services/authentication.service.js';

export default {

    methods: {
        async generateFile(id, isFacture) {
            if(isFacture) {
                try {
                    const devis = await Axios.get(`/api/devis/pdf/${id}`, { responseType: 'arraybuffer' });
                    const file  = await Axios.get(`/api/devis/pdf/name/${id}`);
                    const responseData = devis.data;
                    const fileData = file.data.data;
                    this.downloadPDF(responseData, fileData);
                } catch (error) {
                    console.log(error)
                }
            } else {
                try {
                    const devis = await Axios.get(`/api/facture/pdf/${id}`, { responseType: 'arraybuffer' });
                    const file  = await Axios.get(`/api/facture/pdf/name/${id}`);
                    const responseData = devis.data;
                    const fileData = file.data.data;
                    this.downloadPDF(responseData, fileData);
                } catch (error) {
                    console.log(error)
                }
            }
        },

        downloadPDF(responseData, fileData) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(new Blob([responseData], { type: 'application/pdf' }));
            a.href = url;
            a.download = fileData.filename;
            a.click();
            window.URL.revokeObjectURL(url);
        }
    }
}