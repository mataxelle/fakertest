<template>
  <v-container class="py-16">
    <div>
        <v-row>
            <v-col>
                <h2 class="text-h2">Dernières actulités</h2>
            </v-col>
        </v-row>
    </div>
    <div v-if="posts.length > 0" class="py-16">
      <v-row v-for="post in pagedPost" :key="post.id">
        <v-col>
          <v-card>
            <v-card-title>
                <h5 class="text-h5">{{ post.titre }}</h5>
            </v-card-title>
            <v-card-text>
              <div class="text--primary">
                {{ post.contenu }}
              </div>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-text class="d-flex justify-end mb-6 text--secondary">AJOUTÉE LE {{ post.createdAt | formatDate }}</v-card-text>
          </v-card>
        </v-col>
      </v-row>
      <v-pagination
        class="mt-16"
        v-model="page"
        :length="pageNumber"
      ></v-pagination>
    </div>

    <div v-else>
      <v-row>
        <v-col class="d-flex justify-center"
          >Il n'y a aucune actualié disponible !</v-col
        >
      </v-row>
    </div>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "ActualitesList",

  data() {
    return {
      posts: {},
      page: 1,
      pageItem: 9,
    };
  },

  async created() {
    const response = await axios.get("http://localhost:8000/posts");
    console.log(response);
    this.posts = response.data;
  },

  computed: {
    pageNumber() {
      return Math.ceil(this.posts.length / this.pageItem);
    },

    pagedPost() {
      const startIndex = (this.page - 1) * this.pageItem;
      const data = [...this.posts];

      return data.splice(startIndex, this.pageItem);
    },
  },
};
</script>
