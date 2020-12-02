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
      result: 0,
    }
  },

  created() {
    this.init()
  },

  methods: {
    calcul() {
      this.result = (this.pourcent / 100 * this.devis.ttc).toFixed(2);
    },

    init() {
      this.result = this.devis.ttc
      console.log(this.result)
    }
  }
}