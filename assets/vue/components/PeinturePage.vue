<template>
    <v-container class="my-16">
        <v-card>
            <v-img :src="peinture.file" alt="image d'un arbre"></v-img>
            <v-card-title>{{ peinture.nom }}</v-card-title>
            <v-card-text>
                {{ peinture.description }}
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import axios from "axios"

export default {
    name: "PeinturePage",

    data() {
        return {
            peinture: {}
        }
    },

    async created() {
        const response = await axios.get(`http://localhost:8000/peinture/show/${this.$route.params.id}`);
        console.log(response);
        this.peinture = response.data;
    }
}
</script>