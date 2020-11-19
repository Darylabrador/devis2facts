<template>
  <div>
    <addOrdi @addClient="add($event)" />
    <div v-for="(client, key) in clients" :key="key">
      <v-col v-if='clients.length != 0'>{{client.name}}</v-col>
      
    </div>
    <v-col v-if='clients.length == 0'> toto </v-col>
  </div>
</template>

<script src='./test.js' />