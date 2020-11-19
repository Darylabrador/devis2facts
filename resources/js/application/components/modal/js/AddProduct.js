import apiProduct from '../../../service/ApiProduct'
export default {
    data() {
        return {
            drawerRight: null,
            price: '',
            priceRules: [
                v => !!v || "le Prix est requis",
                v => !isNaN(parseFloat(v)) || "Ce champ doit être un nombre"
            ],
            name: '',
            nameRules: [
                v => !!v || "Un nom est requis",
            ],
            valid: true,
            lazy: false,
        }
    },

    methods: {
        addProduct: async function() {
            var data = {
                name: this.name,
                default_price: this.price
            }

            var res = await apiProduct.create(data)

            console.log(res)
        }
    },

}
