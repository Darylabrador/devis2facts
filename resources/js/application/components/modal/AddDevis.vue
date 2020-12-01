<template>
  <v-sheet
    height="400"
    class="overflow-hidden"
    style="position: relative;"
  >
    <v-container class="fill-height">
      <v-row
        align="center"
        justify="center"
      >
        <v-btn
          color="black"
          dark
          @click.stop="drawer = !drawer"
        >
          Ajouter un devis +
        </v-btn>
      </v-row>
    </v-container>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >

      <v-list dense>
        <v-list-item

        >

          <v-dialog
        ref="dialog"
        v-model="modal"
        :return-value.sync="date"
        width="290px"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="date"
            label="date expiration"
            prepend-icon="mdi-calendar"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="date"
          scrollable
        >

          <v-spacer></v-spacer>

          <v-btn
            text
            color="primary"
            @click="$refs.dialog.save(date)"
          >
            OK
          </v-btn>
        </v-date-picker>
      </v-dialog>


        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-sheet>
</template>

<script src="./js/AddDevis.js"></script>


