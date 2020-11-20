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
                <delClient :client=client @delClient="del($event)" />
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script src="./client.js" />