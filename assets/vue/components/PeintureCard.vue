<template>
  <v-container class="my-16">
    <v-row>
      <v-col sm="12" md="7">
        <v-img :src="peinture.file" alt="image d'un arbre"></v-img>
      </v-col>
      <v-col>
        <v-card outlined color="transparent">
          <v-card-title>
            <h5 class="text-h5 font-weight-light">{{ peinture.nom }}</h5>
          </v-card-title>
          <v-card-text>
            <p>{{ peinture.description }}</p>
            <div>
              <p>Largeur : {{ peinture.largeur }} cm</p>
              <p>Hauteur : {{ peinture.hauteur }} cm</p>
            </div>
            <p>
              Date de réalisation : {{ peinture.dateRealisation | formatDate }}
            </p>
            <div v-if="peinture.enVente">
              <p class="font-weight-bold">Disponible à la vente</p>
              <p>{{ peinture.prix }}€</p>
            </div>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "PeinturePage",

  data() {
    return {
      peinture: {},
    };
  },

  async created() {
    const response = await axios.get(
      `http://localhost:8000/peinture/show/${this.$route.params.slug}`
    );
    console.log(response);
    this.peinture = response.data;
  },
};
</script>
