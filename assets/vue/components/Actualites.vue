<template>
  <div>
    <section class="py-16">
      <v-card max-width="80%" class="mx-auto px-5" outlined color="transparent">
        <h4 class="text-h5 mb-8">Dernières actualiés</h4>
        <v-row>
          <v-col v-for="actu in actualites" :key="actu.id" cols="12" sm="6" md="4">
            <v-card>
              <v-card-title class="text--primary">
                {{ actu.titre }}
              </v-card-title>
              <v-card-text>
                <div class="text--primary">
                  contenu
                </div>
              </v-card-text>
              <v-card-actions>
                <v-btn :to="{ name: 'actualite_details', params: {slug: actu.slug} }" text color="deep-purple accent-4"> LIRE </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-card>
    </section>
  </div>
</template>

<script>
import axios from "axios"

export default {
  name: "Actualites",

  data() {
    return {
      actualites: {},
    }
  },

  async created() {
    const response = await axios.get("http://localhost:8000/posts");
    this.actualites = response.data.slice(0, 3);
  },
};
</script>
