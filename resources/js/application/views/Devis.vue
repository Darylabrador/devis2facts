<template>
  <v-container>
    <template>
      <div>date</div>
      <div>date</div>
      <v-row class="justify-center">
        <v-data-table
          :headers="headers"
          :items="ligne"
          :items-per-page="5"
          hide-default-footer
          class="elevation-1"
        >
          <template v-slot:header="{ props: { headers } }">
            <thead>
              <tr>
                <th :colspan="headers.length">
                  <v-row>
                    <v-col md='4' class="mt-4"><addLigne /></v-col>
                    <v-col md="4"><autocomplete /></v-col>
                    <v-col md="4"><tva /></v-col>
                  </v-row>
                </th>
              </tr>
            </thead>
          </template>
          <template v-slot:item.product="{ item }"> {{item.name}}</template>
          <template v-slot:item.quantity="{ item }">{{
            item.quantity
          }}</template>
          <template v-slot:item.price="{ item }">{{ item.price }}</template>
          <template v-slot:item.total="{ item }"
            >{{ item.quantity * item.price }}
          </template>
          <template v-slot:item.check="{ item }">
            <v-checkbox class="mb-2" v-model="checkbox" />
          </template>
        </v-data-table>
      </v-row>
    </template>
  </v-container>
</template>

<script src='./devis.js' />