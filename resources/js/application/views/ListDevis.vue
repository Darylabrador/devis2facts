<template>
	<div>
		<div class="text-center">
			<h1 class="ma-7 py-0 color-orange">Liste des Devis</h1>
		</div>

		<v-container>
			<v-card class="bg-light-grey">
				<v-card-title class="pa-5">
					<addDevis />
					<v-spacer></v-spacer>
					<v-text-field
						v-model="search"
						append-icon="mdi-magnify"
						label="Rechercher"
						single-line
						hide-details
						color="#FFB649"
						class="search-field"
					>
					</v-text-field>
				</v-card-title>
				<v-data-table
					:headers="headers"
					:items="info"
					:search="search"
					class="mt-5 pa-5 bg-light-grey"
				>
					<template v-slot:item.is_accepted="{ item }">
						<v-switch v-model="item.is_accepted" color="#FFB649"></v-switch>
					</template>

					<template v-slot:item.filename="{ item }">
						{{ format(item.filename) }}
					</template>

					<template v-slot:item.client="{ item }">
						{{ item.client.name }}
					</template>

					<template v-slot:item.carbs="{ item }">
						<v-row class="d-flex">
							<v-btn icon @click="generateEmail(item.id)">
								<v-icon>mdi-email</v-icon>
							</v-btn>
							<v-btn icon v-if="item.ttc != 0" @click="generateFile(item.id, true)">
								<v-icon>mdi-file-download</v-icon>
							</v-btn>
							<v-btn v-if="!item.is_acompte" icon :to="'/devis/' + item.id">
								<v-icon>mdi-eye-settings</v-icon>
							</v-btn>
							<v-btn v-else icon :to="'/devis/acompte/' + item.id">
								<v-icon>mdi-eye-settings</v-icon>
							</v-btn>
							<v-spacer></v-spacer>
							<deleteDevis
								@delDevis="delDevis($event)"
								:filename="format(item.filename)"
								:devis="item"
							/>
						</v-row>
					</template>
				</v-data-table>
			</v-card>
		</v-container>
	</div>
</template>
<style>
.bg-light-grey {
	background-color: #f7f7f7 !important;
}
.color-orange {
	color: #f90 !important;
}
.btn-grey {
	background-color: #9f9f9f !important;
}
</style>
<script src="./listDevis.js" />

