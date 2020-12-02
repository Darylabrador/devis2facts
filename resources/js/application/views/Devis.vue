<template>
	<v-container>
		<template>
			<v-row justify="end">
				<v-col md="4">
					<v-card class="pa-5" outlined>
						<div>Date de création : {{ this.devis.creation }}</div>
						<div>Date d'éxpiration : {{ this.devis.expiration }}</div>
					</v-card>
				</v-col>
				<v-col md="4"> </v-col>
				<v-col md="4">
					<v-card class="pa-5 text-left" outlined>
						<v-simple-table>
							<template v-slot:default>
								<tbody>
									<tr>
										<td>Total hors taxe</td>
										<td>{{ valuetht }}</td>
									</tr>
									<tr>
										<td>Total ttc en cours</td>
										<td>{{ valuettc }}</td>
									</tr>
									<tr>
										<td>Remise (en %)</td>
										<td>
											<v-text-field
												v-model="remise"
												type="number"
												:rules="pourcentRule"
												@change="emis(remise)"
												value="remise"
												min="0"
												max="100"
											></v-text-field>
										</td>
									</tr>
								</tbody>
							</template>
						</v-simple-table>
					</v-card>
				</v-col>
			</v-row>
			<v-row class="justify-center mt-10">
				<v-data-table
					:headers="headers"
					:items="lignes"
					:items-per-page="10"
					hide-default-footer
					class="elevation-1"
				>
					<template v-slot:header="{ props: { headers } }">
						<thead>
							<tr>
								<th :colspan="headers.length">
									<v-row>
										<v-col md="3"><addLigne @addLigne="add($event)" /></v-col>
										<v-col md="3">
											<deleteLigne />
										</v-col>
										<v-col md="3">
											<v-container>
												<v-btn
													v-if="!isDisable"
													:disabled="isDisable"
													@click="isFact()"
													depressed
												>
													<v-icon class="ml-2 primary--text"
														>mdi-eye-plus</v-icon
													>
													Facturer
												</v-btn>
												<v-btn
													v-else
													:disabled="!isDisable"
													@click="drawerRight = !drawerRight"
													depressed
												>
													<v-icon class="ml-2 primary--text">mdi-eye</v-icon>
													Facturer
												</v-btn>
												<v-navigation-drawer
													v-model="drawerRight"
													app
													persistent
													hide-overlay
													right
												>
													<v-list-item>
														<v-list-item-content>
															<v-list-item-title class="title mt-3 text-center"
																>Liste des factures</v-list-item-title
															>
														</v-list-item-content>
													</v-list-item>

													<v-divider></v-divider>
													<div class="mt-7">
														<v-list-item
															v-for="(facture, key) in getFactures"
															:key="key"
														>
															<v-btn depressed @click="generateFile(facture.facture.id)"
																><v-icon>mdi-download</v-icon>
																{{ facture.facture.filename }}</v-btn
															>
														</v-list-item>
													</div>
												</v-navigation-drawer>
											</v-container>
										</v-col>
										<v-col md="3">
											<!-- <tva /> -->
										</v-col>
									</v-row>
								</th>
							</tr>
						</thead>
					</template>
					<template v-slot:item.product="{ item }"> {{ item.name }}</template>
					<template v-slot:item.quantity="{ item }">{{
						item.quantity
					}}</template>
					<template v-slot:item.description="{ item }">{{
						item.description
					}}</template>
					<template v-slot:item.price="{ item }">{{ item.price }}</template>
					<template v-slot:item.total="{ item }"
						>{{ item.quantity * item.price }}
					</template>
					<template v-slot:item.check="{ item }">
						<check
							@createFacture="createFacture($event)"
							:verifCheck="verifCheck"
							:ligne="item"
						/>
					</template>
				</v-data-table>
			</v-row>
		</template>
	</v-container>
</template>

<script src='./devis.js' />