import Axios from "axios"
//import DashboardStats from "../service/charts/dashboardStats.js";

export default {
    created() {
        //this.createStats()
    },

    methods: {
        /**
         * Get all information for stats graph
         */
        async createStats() {
            try {
                const statsInfo = await Axios.get('/api/stats');
                const responseData = statsInfo.data.data;
                DashboardStats(responseData);


            } catch (error) {
                console.error(error);
            }
        },
    }
}
