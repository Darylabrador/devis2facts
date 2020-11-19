<template>
    <div>
       

  <v-card
    class="mx-auto"
    width="200px"
  >
    <v-card-title>
      Liste Clients
    </v-card-title>
  </v-card>


                    <v-simple-table style="margin-left:25vw;margin-top:10vh; width:50vw">
                        <template v-slot:default>
                            <tbody>
                                <tr
                                v-for="client in clients" :key
                                >
                                <td>{{client.name}}</td>


                                <td>
                                    <v-btn
                                    depressed
                                    >
                                    <v-icon color="red" right>
                                        mdi-delete
                                    </v-icon>
                                    </v-btn>
                                </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>


                    

    </div>
</template>

<script src="./client.js" />