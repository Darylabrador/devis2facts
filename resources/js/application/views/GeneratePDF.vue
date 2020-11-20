<template>
    <v-container class="text-center mt-10">
        <v-btn class="mx-4" @click="generateFile(1, true)"> Devis </v-btn>
        <v-btn class="mx-4" @click="generateFile(1, false)"> Facture </v-btn>
    </v-container>
</template>

<script src="./generatePDF.js"></script>