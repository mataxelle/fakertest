<template>
  <div>
    <section class="py-16">
      <div v-if="peintures.length > 0">
        <v-row>
          <v-col v-for="peinture in pagedPeinture" :key="peinture.id" cols="12">
            <v-card max-width="600" height="250px" class="mx-auto">
              <div class="d-flex flex-no-wrap justify-space-between">
                <div>
                  <v-card-title class="text-h5">{{
                    peinture.nom
                  }}</v-card-title>

                  <v-card-subtitle
                    >Publié le {{ peinture.createdAt }}</v-card-subtitle
                  >

                  <v-card-actions>
                    <v-btn outlined rounded small> Peinture </v-btn>
                  </v-card-actions>
                </div>
              </div>
            </v-card>
          </v-col>
        </v-row>
        <v-pagination class="mt-16" v-model="page" :length="pageNumber"></v-pagination>
      </div>

      <div v-else>
        <v-row>
          <v-col>Il n'y a aucune peintures de disponible !</v-col>
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
      pageItem: 3,
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
