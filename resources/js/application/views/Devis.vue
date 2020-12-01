<template>
  <v-container>
    <template>
      <v-row justify="end">
        <v-col md="4">
          <v-card class="pa-5" outlined>
            <div>Date de création : {{ creation }}</div>
            <div>Date d'éxpiration : {{ expiration }}</div>
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
          <div>
            <v-btn @click="isFact()" depressed>
              <v-icon class="ml-2 primary--text">mdi-eye</v-icon> Facturer
            </v-btn>
            <v-navigation-drawer
              persistent
              v-model="drawerRight"
              app
              permanent
              hide-overlay
              right
            >
              <v-list-item v-if="isFacture">
                <v-list-item-content>
                  <v-list-item-title class="title mt-3 text-center"
                    >Liste des factures</v-list-item-title
                  >
                  <v-list-item v-for="(facture, key) in factures" :key="key">
                    {{ facture.product.name }}
                  </v-list-item>
                </v-list-item-content>
              </v-list-item>
            </v-navigation-drawer>
          </div>
        </v-col>
      </v-row>
      <v-row class="justify-center mt-10">
        <v-data-table
          :headers="headers"
          :items="lignes"
          :items-per-page="10"
          expand="false"
          hide-default-footer
          class="elevation-1"
        >
          <template v-slot:header="{ props: { headers } }">
            <thead>
              <tr>
                <th :colspan="headers.length">
                  <v-row>
                    <v-col md="4"><addLigne  @addLigne="add($event)" /></v-col>
                    <v-col md="4">
                      <!-- <autocomplete /> -->
                    </v-col>
                    <v-col md="4"><tva /></v-col>
                  </v-row>
                </th>
              </tr>
            </thead>
          </template>
          <template v-slot:item.product="{ item }"> {{ item.name }}</template>
          <template v-slot:item.quantity="{ item }">{{
            item.quantity
          }}</template>
          <template v-slot:item.description="{ item }">
            <div
              class="text-center d-inline-block text-truncate"
              style="max-width: 200px"
            >
              <v-menu offset-y>
                <template v-slot:activator="{ on, attrs }">
                  <v-btn text color="primary" dark v-bind="attrs" v-on="on">
                    {{ item.description }}
                  </v-btn>
                </template>
                <v-list class="align-items-center">
                  <v-list-item>
                    <div style="width: 600px; word-wrap: break-word">
                      {{ item.description }}
                    </div>
                  </v-list-item>
                </v-list>
              </v-menu>
            </div>
          </template>
          <template v-slot:item.price="{ item }">{{ item.price }}</template>
          <template v-slot:item.total="{ item }"
            >{{ item.quantity * item.price }}
          </template>
          <template v-slot:item.check="{ item }">
            <check
              @createFacture="createFacture($event)"
              :valid="valid"
              :verifCheck="verifCheck"
              :ligne="item"
            />
          </template>
          <template v-slot:item.button="{ item }">
              <addLigne :ligne="item" :isModified="true" @addLigne="add($event)" />
          </template>
        </v-data-table>
      </v-row>
    </template>
  </v-container>
</template>

<script src='./devis.js' />
