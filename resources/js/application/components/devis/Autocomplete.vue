<template>
  <v-autocomplete
    v-model="select"
    :loading="loading"
    :items="listClients"
    item-text="name"
    item-value="id"
    cache-items
    :search-input.sync="search"
    @change="getClient()"
    return-object
    :hide-no-data="!no_data"
    hide-selected
    hide-details
    placeholder="Client"
  ></v-autocomplete>
</template>

<script src="./autocomplete.js" />