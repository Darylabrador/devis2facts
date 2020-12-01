<template>

    <v-dialog v-model="dialog" persistent max-width="600">



      <template v-slot:activator="{ on, attrs }">
        <v-btn icon color="red" v-bind="attrs" v-on="on">
              <v-icon>mdi-delete</v-icon>
        </v-btn>
      </template>



      <v-card>
        <v-btn icon color="red" @click="dialog = false">
          <v-icon>mdi-close-circle</v-icon>
        </v-btn>
        <v-card-title class="headline d-flex justify-content-between">


          {{ "Supprimer un Devis " }}
        </v-card-title>

        <v-card-text
          >Etes-vous sure de vouloir supprimer le devis :
          <strong class="text-danger"> {{ filename }}</strong
          >?
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="dialog = false">
            Annuler
          </v-btn>
          <v-btn color="red darken-1" text
          @click="dialog = false; delDevis()"
          >
            Supprimer
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

</template>

<script src="./js/DeleteDevis.js">
</script>
