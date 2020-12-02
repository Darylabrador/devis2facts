export default {
  props: {
    devis: {
      defaut: function () {
        return {}
      }
    },
  },
  data() {
    return {
      sheet: false,
      pourcent: 0,
    }
  },

  methods: {
    calcul() {
      let result = (this.pourcent / 100 * this.devis.ttc).toFixed(2);
      console.log(result);
    }
  }
}