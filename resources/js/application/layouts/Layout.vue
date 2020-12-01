<template>
  <v-app class="bg-grey">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"/>

    <navbar></navbar>

    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
    <footer />
  </v-app>
</template>
<style>
.bg-grey{
    background-color: #424242 !important;
}
</style>
<script>
import Navbar from "../navigations/Navbar.vue";
import Footer from "../navigations/Footer.vue"
export default {
  components: {
    Navbar,
    Footer
  }
};
</script>
