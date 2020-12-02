<template>
	<v-bottom-sheet v-model="sheet" inset>
		<template v-slot:activator="{ on, attrs }">
			<v-btn v-bind="attrs" v-on="on" depressed>
				<v-icon class="mr-2 primary--text">mdi-credit-card-refund</v-icon>
				Acompte
			</v-btn>
		</template>
		<v-sheet class="text-center px-10" height="200px">
			<v-row class="d-flex" align="center">
				<v-col cols="6"> Toute Taxe Comprise: {{ devis.ttc }} € </v-col>
				<v-col cols="6"> Total Hors Taxe: {{ devis.tht }} € </v-col>
			</v-row>
			<v-row align="center" justify="center">
				<v-col cols="4">
					<v-text-field
						v-model="pourcent"
						placeholder="pourcentage total"
						type="number"
						min="0"
					>
					</v-text-field>
				</v-col>
			</v-row>
			<v-btn @click="calcul()">BOUTON</v-btn>
		</v-sheet>
	</v-bottom-sheet>
</template>

<script src="./js/acompte.js" />