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
				<v-col cols="6"> Montant facturé ttc: {{ result }} € </v-col>
				<v-col cols="6"> Toute taxe comprise: {{ devis.ttc }} € </v-col>
			</v-row>
			<v-row align="center" justify="center">
				<v-col cols="4">
					<v-text-field
						v-model="pourcent"
						placeholder="pourcentage total"
						type="number"
						min="0"
						max="100"
					>
					</v-text-field>
				</v-col>
			</v-row>
			<v-row>
				<v-col cols="6">
					<v-btn depressed @click="calcul()">Calculer</v-btn>
				</v-col>
				<v-col
					><v-btn cols="6" depressed @click="facturer()"
						><v-icon>mdi-eye-plus</v-icon></v-btn
					></v-col
				>
			</v-row>
		</v-sheet>
	</v-bottom-sheet>
</template>

<script src="./js/acompte.js" />