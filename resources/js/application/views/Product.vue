<template>
  <div>
    <div class="text-center">
      <h1>Liste Clients</h1>
    </div>

    <v-simple-table style="margin-left: 25vw; margin-top: 10vh; width: 50vw">
      <template v-slot:default>
        <thead>
          <addProduct @addProduct="add($event)" />
        </thead>
        <tbody>
          <tr>
            <td>Nom du Produit</td>
            <td>Prix par Default</td>
            <td></td>
          </tr>
          <tr v-for="(product, key) in products" :key="key">
            <td>{{ product.name }}</td>
            <td>{{ product.default_price }} €</td>

            <td class="text-right">
              <deleteProductModal
                :product="product"
                :index="key"
                @deleteProduct="deleteProd($event)"
              />
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script src="./product.js" />
