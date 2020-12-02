<template>
  <v-select
    v-model="tva"
    :items="devis"
    item-value="id"
    item-text="tva"
    
    label='Tva'
  >
  </v-select>
</template>
<script src="./tva.js" />