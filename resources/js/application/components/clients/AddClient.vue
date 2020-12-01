<template>
  <div>
    <v-btn v-if='!isModifier' @click.stop="drawerRight = !drawerRight" class="mr-4 btn-grey">
        <v-icon class="mr-2" >mdi-account-multiple-plus</v-icon>
        Ajouter client
    </v-btn>
    <v-btn v-if='isModifier' @click.stop="drawerRight = !drawerRight,update(client)" text>
      <v-icon class="ml-2" color="#737373">mdi-settings</v-icon>
    </v-btn>
    <v-navigation-drawer v-model="drawerRight" width="380px" app temporary hide-overlay right>

      <v-list-item class="bg-orange" style="height: 70px">
        <v-list-item-content>
          <v-list-item-title v-if='!isModifier' class="title">
              <v-row class="align-center ml-5">
                  <v-btn
                      @click="drawerRight = !drawerRight"
                      icon
                      class="mr-3 black--text">
                      <v-icon>mdi-close</v-icon>
                  </v-btn>
                  Ajouter un client
              </v-row>
          </v-list-item-title>

          <v-list-item-title v-if='isModifier' class="title">
              <v-row class="align-center ml-5">
                  <v-btn
                      @click="drawerRight = !drawerRight"
                      icon
                      class="mr-3 black--text">
                      <v-icon>mdi-close</v-icon>
                  </v-btn>
              Modifier un client
              </v-row>
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
      <v-form ref="form" v-model="valid" :lazy-validation="lazy">
        <v-row class="mr-5 mt-5 ml-5">
          <v-text-field
            v-model="name"
            label="Nom de l'utilisateur"
            :rules="nameRules"
            prepend-icon="mdi-account"
            color="#f90"
            required
          ></v-text-field>
        </v-row>
        <v-row class="mr-5 mt-5 ml-5">
          <v-text-field
            v-model="email"
            :rules="emailRules"
            label="Email de l'utilisateur"
            prepend-icon="mdi-account"
            color="#f90"
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
 .bg-orange {
     background-color: #FFB649;
 }
</style>

<script src="./addClient.js" />
