<template>
    <v-container class="fill-height">
      <v-row align="center" justify="center">
            <v-toolbar dark flat>
              <v-toolbar-title>Identifiez-vous</v-toolbar-title>
              <v-spacer />
            </v-toolbar>
            <v-card-text>
              <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                <v-text-field
                  label="Email de connexion"
                  v-model="user.email"
                  name="login"
                  :rules="emailRules"
                  prepend-icon="mdi-account"
                  type="text"
                />

                <v-text-field
                  id="password"
                  label="Mot de passe"
                  v-model="user.password"
                  :rules="pwdRules"
                  name="password"
                  prepend-icon="mdi-lock"
                  type="password"
                  @keydown.enter="connection"
                />
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-btn outlined color="success" :disabled="!valid" @click="connection">Connexion</v-btn>
              <div class="ml-7">
                <span>{{erreur}}</span>
              </div>
            </v-card-actions>
      </v-row>
    </v-container>
</template>

<script src='./login.js'>
</script>