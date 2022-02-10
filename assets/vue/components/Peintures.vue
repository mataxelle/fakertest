<template>
  <div>
    <section class="py-16">
      <div v-if="peintures.length > 0">
        <v-row>
          <v-col v-for="peinture in pagedPeinture" :key="peinture.id" cols="12" xs="8" offset-xs="2">
            <v-card max-width="900" height="250" class="mx-auto my-10">
              <v-row no-gutters>
                <v-col cols="5">
                  <router-link :to="{ name: 'peinture', params: {id: peinture.id} }">
                    <v-img :src="peinture.file" alt="image d'un arbre" class="rounded-l" height="250"></v-img>
                  </router-link>
                </v-col>
                <v-col cols="7">
                  <v-card height="250">
                    <v-card-title>
                      <router-link :to="{ name: 'peinture', params: {id: peinture.id} }" class="text-decoration-none">
                        <p class="black--text">{{ peinture.nom }}</p>
                      </router-link>
                    </v-card-title>
                    <v-card-text class="mt-4">{{ peinture.description }}</v-card-text>
                    <v-divider class="mx-4"></v-divider>
                    <v-card-text class="d-flex justify-end mb-6 text--secondary">AJOUTÉE LE {{ peinture.createdAt | formatDate }}</v-card-text>
                  </v-card>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
        <v-pagination class="mt-16" v-model="page" :length="pageNumber"></v-pagination>
      </div>

      <div v-else>
        <v-row>
          <v-col class="d-flex justify-center">Il n'y a aucune peinture disponible !</v-col>
        </v-row>
      </div>
    </section>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Peintures",

  data() {
    return {
      peintures: {},
      page: 1,
      pageItem: 6,
    };
  },

  async created() {
    const response = await axios.get("http://localhost:8000/peintures");
    this.peintures = response.data;
  },

  computed: {
    pageNumber() {
      return Math.ceil(this.peintures.length / this.pageItem);
    },

    pagedPeinture() {
      // get the start index for your paged result set.
      // The page number starts at 1 so the active item in the pagination is displayed properly.
      // However for our calculation the page number must start at (n-1)
      const startIndex = (this.page - 1) * this.pageItem;

      // create a copy of your assets list so we don't modify the original data set
      const data = [...this.peintures];

      // only return the data for the current page using splice
      return data.splice(startIndex, this.pageItem);
    }
  }
};
</script>
