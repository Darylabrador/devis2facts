<template>
	<v-checkbox
		class="mb-2"
		v-model="checkbox"
		@change="check()"
	/>
</template>
<script>
export default {
	props: {
		ligne: {
			default: function () {
				return {};
			},
		},
		verifCheck: {
			default: function () {
				return Boolean;
			},
		},
	},

	data() {
		return {
			checkbox: false,
		};
	},


	methods: {
		check() {
			// this.$emit('validCheck', {check: this.checkbox, ligne: this.ligne});
      this.$emit('createFacture', {check: this.checkbox, ligne: this.ligne, id: this.ligne.id});
			
		},
	},
};
</script>