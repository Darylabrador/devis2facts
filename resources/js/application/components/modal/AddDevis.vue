<template>

    <v-dialog v-model="dialog" max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="mr-4 btn-grey" v-bind="attrs" v-on="on" > + Créer un devis </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Création d'un devis</span>
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

                <v-text-field
                  label="Date expiration"
                  color="#f90"
                  required
                  v-model="dateExp"
                ></v-text-field>
              </v-col>

              <v-col cols="12" sm="6" md="4">
                <v-text-field label="TVA" color="#f90" v-model="tva"></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>Tout les champs sont requis</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
            <v-btn
                color="green"
                text
                @click="
              addDevis();
              dialog = false;
            "
            >
                Créer
            </v-btn>
          <v-btn color="red" text @click="dialog = false"> Annuler </v-btn>

        </v-card-actions>
      </v-card>
    </v-dialog>
</template>
<style>
.btn-grey{
    background-color: #9F9F9F !important;
}
</style>
<script src="./js/AddDevis.js"></script>


