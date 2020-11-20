<template>
  <v-select
    v-model="tva"
    :items="devis"
    item-value="id"
    item-text="tva"
    return-object
    label='Tva'
  >
  </v-select>
</template>
<script src="./tva.js" />