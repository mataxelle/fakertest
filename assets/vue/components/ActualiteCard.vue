<template>
    <v-container>
        <v-row>
            <v-col>
                <v-card max-width="50%" class="mx-auto">
                    <v-card-title>
                        <h4 class="text-h4">{{ actualite.titre }}</h4>
                    </v-card-title>
                    <v-divider class="mx-4 mt-8"></v-divider>
                    <v-card-subtitle class="text-right">
                        Publié le {{ actualite.createdAt | formatDate }}
                    </v-card-subtitle>
                    <v-divider class="mx-4 mb-8"></v-divider>
                    <v-card-text>
                        {{ actualite.contenu }}
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import axios from "axios"

export default {
    name: "ActualiteCard",

    data() {
        return {
            actualite: {}
        }
    },

    async created() {
        const response = await axios.get(`http://localhost:8000/post/show/${this.$route.params.slug}`);
        this.actualite = response.data;
    }
}
</script>