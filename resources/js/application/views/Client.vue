<template>
  <div>
    <div class="text-center">
      <h1 class="ma-7 py-0 color-orange ">Liste Clients</h1>
    </div>
    <v-container >
      <v-simple-table class="bg-light-grey pa-5" >
        <template v-slot:default >
          <thead >
            <addClient @addClient="add($event)" class="mb-5"/>
          </thead>
          <tbody>
            <tr v-for="(client, key) in clients" :key="key">
              <td>{{ client.name }}</td>

              <td class="text-right">
                <v-row class="d-flex flex-row-reverse">
                  <delClient
                    class="hidden-sm-and-down"
                    style="margin-right: -15vh"
                    :client="client"
                    @delClient="del($event)"
                  />
                    <addClient
                        @updateClient="update($event)"
                        :client="client"
                        :isModifier="true"
                    />

                </v-row>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-container>
  </div>
</template>
<style>
.color-orange{
    color: #F90   !important;
}

.color-grey{
    color: #F90   !important;
}
.bg-light-grey{
    background-color: #F7F7F7 !important;
}

</style>
<script src="./client.js" />
