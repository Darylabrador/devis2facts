<template>
  <div>
    <v-btn @click.stop="drawerRight = !drawerRight" text>
      <v-icon class="ml-2 success--text">mdi-tag-outline</v-icon>
    </v-btn>

    <v-navigation-drawer v-model="drawerRight" app temporary hide-overlay right>
      <v-btn
        @click="drawerRight = !drawerRight"
        icon
        class="red--text mr-5 mt-2"
      >
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="title mt-3 text-center"
            >Ajouter d'un Produit</v-list-item-title
          >
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
      <v-form ref="form" v-model="valid" :lazy-validation="lazy">
        <v-row class="mr-5 ml-5">
          <v-text-field
            v-model="name"
            label="Nom du produit"
            :rules="nameRules"
            prepend-icon="mdi-tag-outline"
            required
          ></v-text-field>
        </v-row>
        <v-row class="mr-5 ml-5">
          <v-text-field
            v-model="price"
            :rules="priceRules"
            min='0'
            type="number"
            label="Prix du produit"
            prepend-icon="mdi-currency-eur"
            required
          ></v-text-field>
        </v-row>
      </v-form>

      <template v-slot:append>
        <v-row>
          <v-col cols="12" md="6" sm="6">
            <v-btn class="success--text" :disabled="!valid" @click="addProduct()" text>
              Valider
              <v-icon class="ml-3">mdi-check</v-icon>
            </v-btn>
          </v-col>
          <v-col cols="12" md="6" sm="6">
            <v-btn class="red--text" text @click="drawerRight = !drawerRight">
              Annuler
            </v-btn>
          </v-col>
        </v-row>
      </template>
    </v-navigation-drawer>
  </div>
</template>

<script src="./addOrdi.js" />

<script src="./js/AddProduct.js"></script>
