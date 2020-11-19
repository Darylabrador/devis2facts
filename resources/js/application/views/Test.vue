<template>
  <div>
    <addOrdi @addClient="add($event)" />
    <div v-for="(client, key) in clients" :key="key">
      <v-col>{{client}}</v-col>
    </div>
  </div>
</template>

<script src='./test.js' />