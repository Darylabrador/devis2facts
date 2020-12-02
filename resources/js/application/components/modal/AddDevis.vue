<template>
	<v-dialog v-model="dialog" max-width="600px">
		<template v-slot:activator="{ on, attrs }">
			<v-btn class="mr-4 btn-grey" v-bind="attrs" v-on="on">
				+ Créer un devis
			</v-btn>
		</template>
		<v-card>
			<v-card-title>
				<v-row class="d-flex justify-between">
					<v-col md="6">
						<span class="headline">Création d'un devis</span>
					</v-col>
					<v-col md="6">
            <label>Reglement par acompte </label>
						<v-switch
							v-model="isAcompte"
						></v-switch>
					</v-col>
				</v-row>
			</v-card-title>
			<v-card-text>
				<v-container>
					<v-row>
						<v-col cols="12">
							<v-row align="center">
								<v-col cols="12">
									<v-autocomplete
										v-model="selectedClient"
										:items="clients"
										dense
										item-value="id"
										item-text="name"
										color="#f90"
										label="Client"
									></v-autocomplete>
								</v-col>
							</v-row>
						</v-col>
						<v-col cols="12" sm="6" md="4">
							<v-dialog
								ref="dialog"
								v-model="modal"
								:return-value.sync="dateM"
								persistent
								width="290px"
							>
								<template v-slot:activator="{ on, attrs }">
									<v-text-field
										v-model="dateM"
										color="#f90"
										label="date expiration"
										prepend-icon="mdi-calendar"
										readonly
										v-bind="attrs"
										v-on="on"
									></v-text-field>
								</template>
								<v-date-picker v-model="dateM" scrollable>
									<v-spacer></v-spacer>
									<v-btn text color="primary" @click="modal = false">
										Cancel
									</v-btn>
									<v-btn text color="primary" @click="$refs.dialog.save(dateM)">
										OK
									</v-btn>
								</v-date-picker>
							</v-dialog>
						</v-col>

						<v-col cols="12" sm="6" md="4">
							<v-text-field
								label="TVA"
								color="#f90"
								v-model="tva"
							></v-text-field>
						</v-col>
					</v-row>
				</v-container>
				<small>Tout les champs sont requis</small>
			</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="red" text @click="dialog = false"> Annuler </v-btn>
				<v-btn
					color="green"
					text
					v-if="selectedClient"
					@click="
						addDevis();
						dialog = false;
					"
				>
					Créer
				</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>
<style>
.btn-grey {
	background-color: #9f9f9f !important;
}
</style>
<script src="./js/AddDevis.js"></script>
