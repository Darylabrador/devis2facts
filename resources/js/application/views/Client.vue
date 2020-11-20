<template>
  <div>
    <div class="text-center">
      <h1>Liste Clients</h1>
    </div>

    <v-simple-table style="margin-left: 25vw; margin-top: 10vh; width: 50vw">
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
                  :client="client.id"
                  @delClient="del($event)"
                />
                <delClient
                  class="hidden-sm-and-down"
                  style="margin-right: -15vh"
                  :client="client.id"
                  @delClient="del($event)"
                />
              </v-row>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script src="./client.js" />