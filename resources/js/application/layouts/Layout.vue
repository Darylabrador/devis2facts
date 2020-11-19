<template>
  <v-app>
    <link
      href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css"
      rel="stylesheet"
    />
    <v-container>
      <navbar></navbar>
    </v-container>
    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
    <footer />
  </v-app>
</template>

<script>
import Navbar from "../navigations/Navbar";
import Footer from "../navigations/Footer"
export default {
  components: {
    Navbar,
    Footer
  }
};
</script>