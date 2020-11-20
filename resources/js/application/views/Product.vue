<template>
  <div>
    <div class="text-center">
      <h1>Liste Produits</h1>
    </div>

    <v-simple-table style="margin-left: 25vw; margin-top: 10vh; width: 50vw">
      <template v-slot:default>
        <thead>
          <addProduct
            @addProduct="add($event)"
            :product="{ id: null, name: null, default_price: null }"
          />
        </thead>
        <tbody>
          <tr class="text-center">
            <td>Nom du Produit</td>
            <td>Prix par Default</td>
            <td></td>
          </tr>
          <tr class="text-center" v-for="(product, key) in products" :key="key">
            <td>{{ product.name }}</td>
            <td>{{ product.default_price }} €</td>

            <td class="text-right">
              <v-row class="d-flex flex-row-reverse">
                <addProduct
                  @addProduct="add($event)"
                  :isModified="true"
                  :product="product"
                />
                <deleteProductModal
                  :product="product"
                  :index="key"
                  @deleteProduct="deleteProd($event)"
                />
              </v-row>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script src="./product.js" />
