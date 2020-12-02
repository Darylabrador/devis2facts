<template>
  <div>
    <div class="text-center">
      <h1 class="mt-5 py-0 px-2 color-orange">Liste Produits</h1>
    </div>

    <v-simple-table class="pa-5" style="margin-left: 25vw; margin-top: 5vh; width: 50vw">
      <template v-slot:default>
        <thead>
          <addProduct
            @addProduct="add($event)"
            :product="{ id: null, name: null, default_price: null }"
          />
        </thead>
        <tbody>
          <tr class="text-center">
            <td class="font-weight-bold">Nom du Produit</td>
            <td class="font-weight-bold">Prix par Default (HT) </td>
            <td></td>
          </tr>
          <tr class="text-center" v-for="(product, key) in products" :key="key">
            <td>{{ product.name }}</td>
            <td>{{ product.default_price }} €</td>

            <td class="text-right">
              <v-row class="d-flex flex-row-reverse">
                  <deleteProductModal
                      :product="product"
                      :index="key"
                      @deleteProduct="deleteProd($event)"
                  />
                <addProduct
                  @addProduct="add($event)"
                  :isModified="true"
                  :product="product"
                />
              </v-row>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<style>
.bg-light-grey{
    background-color: #F7F7F7 !important;
}
.color-orange{
    color: #F90   !important;
}
.btn-grey{
    background-color: #9F9F9F !important;
}
</style>
<script src="./product.js" />
