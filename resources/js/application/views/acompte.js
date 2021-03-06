import Axios from "axios"
import Tva from '../components/devis/Tva.vue'
import Autocomplete from '../components/devis/Autocomplete.vue'
import AddLigne from '../components/devis/AddLigne.vue'
import { apiService } from '../_services/apiService'
import DeleteLigne from '../components/devis/lignedevis/DeleteLigne.vue'
import Acompte from '../components/modal/Acompte.vue'

export default {
    components: {
        Tva,
        Autocomplete,
        AddLigne,
        DeleteLigne,
        Acompte
    },


    data() {
        return {
            pourcentRule: [v => (!isNaN(parseFloat(v)) && v >= 0 && v <= 100) || 'Le nombre doit être compris entre 0 et 100'],
            total: [],
            tva: '',
            prix: [],
            isEditing: false,
            headers: [{
                    text: '',
                    value: 'button'
                },
                {
                    text: 'Produit',
                    align: 'start',
                    sortable: false,
                    value: 'product.name',
                },
                { text: 'Quantité', value: 'quantity' },
                { text: 'Description', value: 'description' },
                { text: 'Prix Unitaire HT', value: 'price' },
                { text: 'Total', value: 'total' },
                { text: '', value: 'check' },
            ],
            lignes: [],
            tht: 0,
            ttc: 0,

            valuetht: 0,
            valuettc: 0,

            remise: 0,
            creation: '',
            expiration: '',
            factures: [],
            drawerRight: false,
            isFacture: false,
            verifCheck: false,
            valid: true,


            devis: [],
            getFactures: [],
            ligneFactures: [],
            isDisable: true,

        }
    },
    created() {
        this.getLigne()
        this.getDevis()
        this.getFact()


    },
    methods: {
        getLigne() {
            apiService.get('/api/devis/find/ligne/' + this.$route.params.id).then(({ data }) => {
                data.data.forEach(ligne => {

                    this.lignes.push(ligne)
                    this.tht += ligne.price * ligne.quantity
                    this.ttc += (ligne.price + ligne.price * ligne.devis.tva / 100) * ligne.quantity
                })

                this.valuetht = this.tht
                this.valuettc = this.ttc

                this.devis.tht = this.valuetht
                this.devis.ttc = this.valuettc
                this.devis.montantTva = this.devis.ttc - this.devis.tht

            })
        },

        getDevis() {
            Axios.get('/api/devis/find/' + this.$route.params.id).then(({ data }) => {
                this.creation = data.data.creation
                this.expiration = data.data.expiration
                this.remise = data.data.remise
                this.devis = data.data
            })
        },



        add(ligne) {
            this.lignes.push(ligne)
            this.tht += ligne.price * ligne.quantity
            this.ttc += (ligne.price + ligne.price * ligne.devis.tva / 100) * ligne.quantity

            this.valuettc = this.ttc - this.ttc * this.devis.remise / 100
            this.valuetht = this.tht - this.tht * this.devis.remise / 100

            this.devis.tht = this.valuetht
            this.devis.ttc = this.valuettc
            this.devis.montantTva = this.devis.ttc - this.devis.tht
        },



        emis(value) {

            this.valuettc = this.ttc - this.ttc * value / 100
            this.valuetht = this.tht - this.tht * value / 100

            // console.log('/api/devis/up/remise/' + this.$route.params.id +'/' + this.remise)

            this.devis.tht = this.valuetht
            this.devis.ttc = this.valuettc

            this.devis.montantTva = this.devis.ttc - this.devis.tht
            this.devis.remise = this.remise

            if (this.remise <= 100 && this.remise >= 0) {
                Axios.post('/api/devis/update/', {
                    id: this.devis.id,
                    client_id: this.devis.client.id,
                    tva: this.devis.tva,
                    tht: this.devis.tht,
                    ttc: this.devis.ttc,
                    montantTva: this.devis.montantTva,
                    remise: this.devis.remise,
                    is_accepted: this.devis.is_accepted,
                    date_expiration: this.devis.expiration
                }).then(({ data }) => {})
            }

        },

        isFact(ligne_devis) {
            console.log(ligne_devis);
            // creation de la ligne de facture
                Axios.post('/api/devis/acompte/create', { lignes_devis: ligne_devis }).then(({ data }) => {
                    // let facture = {}
                    // facture = { facture: data.data };
                    // this.getFactures.push(facture);
                    // this.ligneFactures.forEach(data => {
                    //     this.lignes.splice(this.lignes.indexOf(data), 1)
                    // })
                    console.log(data);


                })

            this.checkbox = !this.checkbox;
            this.isFacture = !this.isFacture;
            this.verifCheck = true;
            this.drawerRight = !this.drawerRight;

            if (this.drawerRight) {
                this.isDisable = true;
            }
        },

        createFacture(facture) {
            if (this.ligneFactures.length != null) {
                if (facture.check == true) {
                    this.isDisable = false;
                    this.factures.push(facture.id);
                    this.ligneFactures.push(facture.ligne);
                    this.tht -= facture.ligne.price * facture.ligne.quantity
                    this.ttc -= (facture.ligne.price + facture.ligne.price * facture.ligne.devis.tva / 100) * facture.ligne.quantity

                    this.valuettc = this.ttc - this.ttc * this.devis.remise / 100
                    this.valuetht = this.tht - this.tht * this.devis.remise / 100

                    this.devis.tht = this.valuetht
                    this.devis.ttc = this.valuettc
                    this.devis.montantTva = this.devis.ttc - this.devis.tht
                }
                else if (facture.check == false) {
                    this.factures.splice(this.factures.indexOf(facture.id), 1);
                    this.ligneFactures.splice(this.ligneFactures.indexOf(facture.ligne), 1);
                    this.tht += facture.ligne.price * facture.ligne.quantity
                    this.ttc += (facture.ligne.price + facture.ligne.price * facture.ligne.devis.tva / 100) * facture.ligne.quantity

                    this.valuettc = this.ttc - this.ttc * this.devis.remise / 100
                    this.valuetht = this.tht - this.tht * this.devis.remise / 100

                    this.devis.tht = this.valuetht
                    this.devis.ttc = this.valuettc
                    this.devis.montantTva = this.devis.ttc - this.devis.tht

                }
                if (this.ligneFactures.length == 0) {
                    this.isDisable = true;
                }
            }
        },

        getFact() {
            Axios.get('/api/facture/get/' + this.$route.params.id).then(({ data }) => {
                data.data.forEach(_data => {
                    if (_data.facture != null) {
                        this.getFactures.push(_data);

                    }


                })
                this.getFactures = _.uniqBy(this.getFactures, 'facture.id');
            })
        },

        downloadPDF(responseData, fileData) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(new Blob([responseData], { type: 'application/pdf' }));
            a.href = url;
            a.download = fileData.filename;
            a.click();
            window.URL.revokeObjectURL(url);
        },

        async generateInvoice(factureId, devisId) {
            try {
                const facture = await Axios.get(`/api/facture/pdf/${factureId}/devis/${devisId}`, { responseType: 'arraybuffer' });
                const file = await Axios.get(`/api/facture/pdf/name/${factureId}`);
                const responseData = facture.data;
                const fileData = file.data.data;
                this.downloadPDF(responseData, fileData);
            } catch (error) {
                console.log(error)
            }
        }
    }
}