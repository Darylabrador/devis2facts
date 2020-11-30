<template>
	<v-checkbox
		class="mb-2"
		v-model="checkbox"
		:disabled="!valid"
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
		valid: {
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
      this.$emit('createFacture', this.ligne);
			
		},
	},
};
</script>