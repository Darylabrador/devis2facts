<template>
  <div>
    <div class="text-center">
      <h1>Liste des Devis</h1>
    </div>
      <v-container>
            <v-row class="mb-7">
                  <v-btn class="mr-4" @click="$router.push({ path: 'devis' })">
                      + Ajouter un Devis
                  </v-btn>
                  <v-spacer></v-spacer>
                  <v-text-field
                      v-model="search"
                      append-icon="mdi-magnify"
                      label="Rechercher"
                      single-line
                      hide-details
                      class="search-field"
                  >
                  </v-text-field>
            </v-row>
              <v-data-table :headers="headers" :items="info" :search="search" class="ma-5">
                  <template v-slot:item.is_accepted="{ item }">
                      <v-switch v-model="item.is_accepted"></v-switch>
                  </template>

                  <template v-slot:item.filename="{ item }">
                      {{ format(item.filename) }}
                  </template>

                  <template v-slot:item.client="{ item }">
                      {{ item.client.name }}
                  </template>

                  <template v-slot:item.carbs="{ item }">
                      <v-row class="d-flex flex-row-reverse">

                          <deleteDevis @delDevis="delDevis($event)" :filename=format(item.filename) :devis="item" />

                          <v-btn icon  @click="generateEmail(item.id)">
                              <v-icon>mdi-email</v-icon>
                          </v-btn>
                          <v-btn icon @click="generateFile(item.id, true)">
                              <v-icon>mdi-file-download</v-icon>
                          </v-btn>
                          <v-btn icon :to="'/devis/' + item.id">
                              <v-icon>mdi-eye-settings</v-icon>
                          </v-btn>
                      </v-row>
                  </template>
              </v-data-table>

      </v-container>


  </div>
</template>

<script src="./listDevis.js" />