<template>
  <div class="px-4">
    <v-row>
      <v-btn color="error" class="mr-4" to="/" text>
        Accueil
      </v-btn>

      <v-btn color="error" class="mr-4" to="/clients" text>
        Clients
      </v-btn>
      
      <v-btn color="error" class="mr-4" to="/devis" text>
        Devis
      </v-btn>

      <v-btn color="error" class="mr-4" to="/products" text>
        Products
      </v-btn>

      <v-btn color="error" class="mr-4" to="/generate" text>
        Generate
      </v-btn>

      <v-btn color="dark" class="nav-item nav-link" text>
        <v-icon class="mr-1 hidden-sm-and-down">mdi-export</v-icon>
      </v-btn>
    </v-row>

  </div>
</template>

<script src='./navbar.js' />