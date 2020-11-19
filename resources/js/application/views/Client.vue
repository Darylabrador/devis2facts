<template>
    <div>
        Client List
        
        <v-container  >
            <v-row v-for='(client,key) in clients' :key='key'>

                {{client}}
                    
            </v-row>
        </v-container>
    </div>
</template>

<script src="./client.js" />