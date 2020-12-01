<template>
  <div>
    <v-btn v-if='!isModifier' @click.stop="drawerRight = !drawerRight" class="mr-4 btn-grey">
        <v-icon class="mr-2" >mdi-account-multiple-plus</v-icon>
        Ajouter client
    </v-btn>
    <v-btn v-if='isModifier' @click.stop="drawerRight = !drawerRight,update(client)" text>
      <v-icon class="ml-2" color="#737373">mdi-settings</v-icon>
    </v-btn>
    <v-navigation-drawer v-model="drawerRight" app temporary hide-overlay right>
      <v-btn
        @click="drawerRight = !drawerRight"
        icon
        class="red--text mr-5 mt-2"
      >
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title v-if='!isModifier'  class="title mt-3 text-center"
            >Ajouter un client</v-list-item-title
          >

          <v-list-item-title v-if='isModifier' class="title mt-3 text-center"
            >Modifier un client</v-list-item-title
          >
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
      <v-form ref="form" v-model="valid" :lazy-validation="lazy">
        <v-row class="mr-5 ml-5">
          <v-text-field
            v-model="name"
            label="Nom de l'utilisateur"
            :rules="nameRules"
            prepend-icon="mdi-account"
            required
          ></v-text-field>
        </v-row>
        <v-row class="mr-5 ml-5">
          <v-text-field
            v-model="email"
            :rules="emailRules"
            label="Email de l'utilisateur"
            prepend-icon="mdi-account"
            required
          ></v-text-field>
        </v-row>
      </v-form>

      <template v-slot:append>
        <v-row>
          <v-col cols="12" md="6" sm="6">
            <v-btn class="success--text" :disabled="!valid" @click="addClient()" text>
              Valider
              <v-icon class="ml-3">mdi-check</v-icon>
            </v-btn>
          </v-col>
          <v-col cols="12" md="6" sm="6">
            <v-btn class="red--text" text @click="drawerRight = !drawerRight">
              Annuler
            </v-btn>
          </v-col>
        </v-row>
      </template>
    </v-navigation-drawer>
  </div>
</template>

<style>
.btn-grey{
    background-color: #9F9F9F !important;
}
</style>

<script src="./addClient.js" />
