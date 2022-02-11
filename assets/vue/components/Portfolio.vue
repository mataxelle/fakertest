<template>
  <div>
    <v-row class="portfolio" align="center" justify="center">
      <v-col class="text-center" cols="12">
          <h1 class="font-italic white--text text-h2">Porfolio</h1>
      </v-col>
    </v-row>

    <v-container class="mt-n16 mb-16">
      <section class="px-sm-16">
        <v-row>
          <v-col
            v-for="categorie in categories"
            :key="categorie.id"
            cols="8"
            offset="2"
            sm="6"
            offset-sm="0"
            md="4"
          >
            <v-card>
              <v-img>
                <v-card-title>{{ categorie.nom }}</v-card-title>
              </v-img>
              <v-card-text>{{ categorie.description }}</v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </section>
    </v-container>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Portfolio",

  data() {
    return {
      categories: {},
    };
  },

  async created() {
    const response = await axios.get("http://localhost:8000/portfolio");
    console.log(response), (this.categories = response.data);
  },
};
</script>

<style scoped>
.portfolio {
  position: relative;
  height: 400px;
  background-image: linear-gradient(#8D6E63, #442013);
  border-bottom-left-radius: 50% 20%;
  border-bottom-right-radius: 50% 20%;
}
</style>
