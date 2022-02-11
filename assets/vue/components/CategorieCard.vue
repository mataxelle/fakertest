<template>
  <div>
    <v-row class="categorie" align="center" justify="center">
      <v-col class="text-center" cols="12" md="6">
        <h1 class="font-italic white--text text-h2">{{ categorie.nom }}</h1>
        <blockquote class="blockquote white--text font-weight-thin">
          <p>{{ categorie.description }}</p>
        </blockquote>
      </v-col>
    </v-row>

    <v-container>
      <section id="actualites" class="py-16">
        <v-row>
          <v-col
            v-for="peinture in categorie.peintures"
            :key="peinture.id"
            cols="8"
            offset="2"
            md="4"
            offset-md="0"
          >
            <v-hover v-slot="{ hover }">
              <v-card :elevation="hover ? 12 : 2" :class="{ 'on-hover': hover }">
                <router-link
                  :to="{ name: 'peinture', params: { id: peinture.id } }"
                >
                  <v-img :src="peinture.file"></v-img>
                </router-link>
              </v-card>
            </v-hover>
          </v-col>
        </v-row>
      </section>
    </v-container>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CategorieCard",

  data() {
    return {
      categorie: {},
    };
  },

  async created() {
    const response = await axios.get(
      `http://localhost:8000/portfolio/${this.$route.params.slug}`
    );
    this.categorie = response.data;
  },
};
</script>

<style scoped>
.categorie {
  position: relative;
  height: 400px;
  background-image: linear-gradient(#8d6e63, #442013);
  border-bottom-left-radius: 90% 40%;
}

.v-card {
transition: opacity .4s ease-in-out;
}

.v-card:not(.on-hover) {
opacity: 0.6;
}
</style>
