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
                    <td><v-text-field v-model='remise' type='number' :rules="pourcentRule" @change='emis(remise)' min='0' max='100'></v-text-field></td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </v-card>
          <facturation :factures='factures'/>
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
                    <v-col md="4"
                      ><addLigne @addLigne="add($event)"
                    /></v-col>
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
          <template v-slot:item.quantity="{ item }">{{ item.quantity }}</template>
          <template v-slot:item.description="{ item }">{{item.description}}</template>
          <template v-slot:item.price="{ item }">{{ item.price }}</template>
          <template v-slot:item.total="{ item }"
            >{{ item.quantity * item.price }}
          </template>
          <template v-slot:item.check="{ item }">
            <v-checkbox class="mb-2" v-model="checkbox" />
          </template>
        </v-data-table>
      </v-row>
    </template>
  </v-container>
</template>

<script src='./devis.js' />