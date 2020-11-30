<template>
  <div>
    <v-btn @click.stop="drawerRight = !drawerRight" depressed>
     <v-icon class="ml-2 primary--text">mdi-eye</v-icon> Facturer
    </v-btn>
    <v-navigation-drawer persistent v-model="drawerRight" app permanent hide-overlay right>
      <v-list-item>
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
</template>

<script src="./facturation.js" />