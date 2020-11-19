import Axios from "axios";

export default {

    data() {
        return {
            clients: [],
        }
    },

    created() {
        this.initialize();
        this.displayHoraire(this.attributions);
    },

    methods: {
        initialize() {

            

        },

        displayHoraire(attributions) {
            attributions.forEach(attribution => {
                for (let i = 0; i < this.horaires.length; i++) {
                    if (this.horaires[i].horaire == attribution.horaire) {
                        this.horaires[i] = attribution;

                    }
                }
            })


        }
    }
}