<template>
  <div>
    <div class="text-center">
      <h1 class="ma-7 py-0 px-2">Liste Clients</h1>
    </div>
    <v-container>
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <addClient @addClient="add($event)" />
          </thead>
          <tbody>
            <tr v-for="(client, key) in clients" :key="key">
              <td>{{ client.name }}</td>

              <td class="text-right">
                <v-row class="d-flex flex-row-reverse">
                  <addClient
                    @updateClient="update($event)"
                    :client="client"
                    :isModifier="true"
                  />
                  <delClient
                    class="hidden-sm-and-up"
                    :client="client"
                    @delClient="del($event)"
                  />

                  <delClient
                    class="hidden-sm-and-down"
                    style="margin-right: -15vh"
                    :client="client"
                    @delClient="del($event)"
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

<script src="./client.js" />
