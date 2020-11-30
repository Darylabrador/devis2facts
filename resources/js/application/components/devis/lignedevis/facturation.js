export default {
    props: {
        factures: {
            default: function() {
                return {}
            }
        }
    },
    data() {
        return {
            drawerRight: false,
        }
    },

    created() {
        console.log(this.facture);
    }, 

    methods: {
        check(item) {
            console.log(item);
        }
    }
}