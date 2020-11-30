<template>
  <div>
    <div class="text-center">
      <h1>Liste des Devis</h1>
    </div>

    <v-card>
      <v-card-title>
        <v-btn class="mr-4" @click="$router.push({ path: 'devis' })">
          Ajouter un Devis +
        </v-btn>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        >
        </v-text-field>
      </v-card-title>
      <v-data-table :headers="headers" :items="info" :search="search">
        
        <template v-slot:item.is_accepted="{ item }">
          <v-switch
            v-model="item.is_accepted"
          ></v-switch>
        </template>

        <template v-slot:item.filename="{ item }">
          {{ format(item.filename) }}
        </template>

        <template v-slot:item.client="{ item }">
          {{ item.client.name }}
        </template>

        <template v-slot:item.carbs="{ item }">
          <v-row class="d-flex flex-row-reverse">
            <v-btn icon>
              <v-icon>mdi-delete</v-icon>
            </v-btn>
            <v-btn icon>
              <v-icon>mdi-email</v-icon>
            </v-btn>
            <v-btn icon @click="generateFile(item.id, true)">
              <v-icon>mdi-file-download</v-icon>
            </v-btn>
            <v-btn icon :to="'/devis/'+ item.id">
              <v-icon>mdi-eye-settings</v-icon>
            </v-btn>
          </v-row>
        </template>
      </v-data-table>
    </v-card>
  </div>
</template>

<script src="./listDevis.js" />
