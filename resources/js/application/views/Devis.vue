<template>
  <v-container class="bg-light-grey">
    <template>
      <v-row>
        <v-col cols="4">
          <v-card class="pa-5" outlined>
            <div>Date de création : {{ creation }}</div>
            <div>Date d'expiration : {{ expiration }}</div>
          </v-card>
        </v-col>
        <v-col cols="4"></v-col>
        <v-col cols="4" class="text-right">
          <v-btn v-if="!isDisable" :disabled="isDisable" @click="isFact()">
            <v-icon class="ml-2 mr-3" color="#F90">mdi-eye-plus</v-icon> Ajout
            facture
          </v-btn>
          <v-btn
            v-else
            :disabled="!isDisable"
            @click="drawerRight = !drawerRight"
            depressed
          >
            <v-icon class="ml-2 primary--text">mdi-eye</v-icon>
            voir facture
          </v-btn>
        </v-col>
      </v-row>
      <div>
        <v-navigation-drawer
          v-model="drawerRight"
          app
          persistent
          hide-overlay
          right
        >
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="title mt-3 text-center">
                Liste des factures
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-divider></v-divider>

          <div class="mt-7">
            <v-list-item v-for="(facture, key) in getFactures" :key="key">
              <v-btn depressed
                ><v-icon>mdi-download</v-icon>
                {{ facture.facture.filename }}</v-btn
              >
            </v-list-item>
          </div>
        </v-navigation-drawer>
      </div>

      <v-row class="ma-2">
        <v-col cols="7"></v-col>
        <v-col cols="5">
          <v-card class="pa-5 text-left" outlined>
            <v-simple-table>
              <template v-slot:default>
                <tbody>
                  <tr>
                    <td>Total hors taxe</td>
                    <td>{{ devis.tht }}</td>
                  </tr>
                  <tr>
                    <td>Total ttc en cours</td>
                    <td>{{ devis.ttc }}</td>
                  </tr>
                  <tr>
                    <td>Remise (en %)</td>
                    <td>
                      <v-text-field
                        v-model="remise"
                        type="number"
						color="#f90"
						:hint="!isEditing ? 'Click the icon to edit' : 'Click the icon to save'"
                        :rules="pourcentRule"
                        :readonly="!isEditing"
                        @change="emis(remise)"
                        value="remise"
                        min="0"
                        max="100"
                      >
                        <template v-slot:append-outer>
                          <v-slide-x-reverse-transition mode="out-in">
                            <v-icon
                              :key="`icon-${isEditing}`"
                              :color="isEditing ? 'success' : 'info'"
                              @click="isEditing = !isEditing"
                              v-text="
                                isEditing
                                  ? 'mdi-check-outline'
                                  : 'mdi-circle-edit-outline'
                              "
                            ></v-icon>
                          </v-slide-x-reverse-transition>
                        </template>
                      </v-text-field>
                    </td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </v-card>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-data-table
            :headers="headers"
            :items="lignes"
            :items-per-page="10"
            hide-default-footer
            class="elevation-1 pa-5"
          >
            <template v-slot:header="{ props: { headers } }">
              <thead>
                <tr>
                  <th :colspan="headers.length">
                    <v-row>
                      <v-col md="4"><addLigne @addLigne="add($event)" /></v-col>
                      <v-col md="4">
                        <!-- <autocomplete /> -->
                      </v-col>
                      <v-col md="4"><tva :devis="devis"/></v-col>
                    </v-row>
                  </th>
                </tr>
              </thead>
            </template>
            <template v-slot:item.product="{ item }"> {{ item.name }}</template>
            <template v-slot:item.quantity="{ item }"
              >{{ item.quantity }}
            </template>
            <template v-slot:item.description="{ item }">{{
              item.description
            }}</template>
            <template v-slot:item.price="{ item }">{{ item.price }}</template>
            <template v-slot:item.total="{ item }">{{
              item.quantity * item.price
            }}</template>
            <template v-slot:item.check="{ item }">
              <check
                @createFacture="createFacture($event)"
                :verifCheck="verifCheck"
                :ligne="item"
              />
            </template>
          </v-data-table>
        </v-col>
      </v-row>
    </template>
  </v-container>
</template>
<style>
.bg-light-grey {
  background-color: #9f9f9f !important;
}
</style>
<script src='./devis.js' />
