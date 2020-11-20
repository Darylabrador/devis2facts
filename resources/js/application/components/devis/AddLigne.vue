<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" max-width="290">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          icon
          class="success--text"
          v-bind="attrs"
          v-on="on"
          @click="addLigne()"
          ><v-icon>mdi-plus</v-icon></v-btn
        >
      </template>
      <v-card>
        <v-form v-model="valid">
          <v-container>
            <v-row>
              <v-col cols="12" md="4">
                <v-select
                  v-model="selectProduct"
                  :items="product"
                  item-value='id'
                  item-text='filename'
                  label="Produit"
                  required
                ></v-select>
              </v-col>

            </v-row>
          </v-container>
        </v-form>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script src="./addLigne.js" />