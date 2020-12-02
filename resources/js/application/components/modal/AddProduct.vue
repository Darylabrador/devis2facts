<template>
    <div>
        <v-btn @click.stop="drawerRight = !drawerRight" text v-if="!isModified" class="btn-grey mb-5">
            <v-icon class="mr-2">mdi-tag-plus-outline</v-icon>
            Ajouter produit
        </v-btn>
        <v-btn @click.stop="drawerRight = !drawerRight" text v-if="isModified">
            <v-icon class="ml-2" color="#737373">mdi-settings</v-icon>
        </v-btn>

        <v-navigation-drawer v-model="drawerRight" width="380px" class="bg-light-grey" app temporary hide-overlay right>
            <v-list-item class="bg-orange" style="height: 70px">
                <v-list-item-content>
                    <v-list-item-title class="title" v-if="!isModified">
                        <v-row class="align-center ml-5">
                            <v-btn @click="drawerRight = !drawerRight" icon class="mr-3 black--text">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                            Ajouter un Produit
                        </v-row>
                    </v-list-item-title>

                    <v-list-item-title class="title text-center" v-if="isModified">
                        <v-row class="align-center ml-5">
                            <v-btn @click="drawerRight = !drawerRight" icon class="mr-3 black--text">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        Modifier un Produit
                        </v-row>
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
            <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                <v-row class="mr-5 mt-7 ml-5">
                    <v-text-field
                        v-model="name"
                        label="Nom du produit"
                        :rules="nameRules"
                        prepend-icon="mdi-tag-outline"
                        color="#f90"
                        required
                    ></v-text-field>
                </v-row>
                <v-row class="mr-5 ml-5">
                    <v-text-field
                        v-model="price"
                        :rules="priceRules"
                        min="0"
                        type="number"
                        label="Prix du produit"
                        prepend-icon="mdi-currency-eur"
                        color="#f90"
                        required
                    ></v-text-field>
                </v-row>
            </v-form>

            <template v-slot:append>
                <v-row>
                    <v-col cols="12" md="6" sm="6">
                        <v-btn
                            class="success--text"
                            :disabled="!valid"
                            @click="addProduct()"
                            text
                            v-if="!isModified"
                        >
                            Valider
                            <v-icon class="ml-3">mdi-check</v-icon>
                        </v-btn>
                        <v-btn
                            class="success--text"
                            :disabled="!valid"
                            @click="addProduct()"
                            text
                            v-if="isModified"
                        >
                            Modifier
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
.bg-orange {
    background-color: #FFB649;
}

.bg-light-grey {
    background-color: #F7F7F7 !important;
}
</style>

<script src="./js/AddProduct.js"></script>
