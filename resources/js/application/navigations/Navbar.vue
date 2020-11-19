<template>
  <v-container>
    <v-row justify="end">
      <v-btn
        color="error"
        class="mr-4"
        to="/login"
        text
      >
        <v-icon class="mr-1 hidden-sm-and-down">mdi-login</v-icon>
      </v-btn>

      <v-btn
        color="error"
        class="nav-item nav-link"
        text
      >
        <v-icon class="mr-1 hidden-sm-and-down">mdi-logout</v-icon>
      </v-btn>
    </v-row>
  </v-container>
</template>

<script src='./navbar.js' />