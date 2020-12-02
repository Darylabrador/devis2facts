<template>
  <v-container>
    <v-row>
      <v-dialog v-model="dialog"
                max-width="600px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn v-if="!isModified" icon class="success--text" v-bind="attrs" v-on="on"
            >
             Ajouter produit
            <v-icon>mdi-plus</v-icon>
          </v-btn>
          <v-btn v-if="isModified" icon class="success--text" v-bind="attrs" v-on="on"
            ><v-icon>mdi-dots-horizontal</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-form v-model="valid">
            <v-container>
              <v-row>
                <v-col md="10">
                  <addProduct v-if="!isModified"
                    @addProduct="add($event)"
                    :product="{ id: null, name: null, default_price: null }"
                  />
                </v-col>
                <v-col md="4">
                  <v-select
                    v-model="selectProduct"
                    :items="products"
                    @change="
                      price = selectProduct.default_price;
                      quantity = 1;
                    "
                    item-text="name"
                    label="Produit"
                    required
                    return-object
                  ></v-select>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="quantity"
                    :rules="nombreRules"
                    label="Quantité"
                    type="number"
                    min="1"
                    required
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="price"
                    label="Prix"
                    required
                  ></v-text-field>
                </v-col>

                <v-col md="12">
                  <v-textarea
                    v-model="description"
                    :rules="descriptionRules"
                    label="Description"
                    required
                  ></v-textarea>
                </v-col>
              </v-row>
              <v-row justify="end">
                <v-btn depressed @click="addLigne()" right>
                  Valider <v-icon>mdi-check</v-icon></v-btn
                >
              </v-row>
            </v-container>
          </v-form>
        </v-card>
      </v-dialog>
    </v-row>
  </v-container>
</template>

<script src="./addLigne.js" />
