<template>
  <v-parallax
    dark
    src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
  >
    <v-row align="center" justify="center">
      <v-col class="text-center" cols="12" md="6">
        <blockquote class="blockquote">
          <p>{{ peintre.aPropos }}</p>
          <footer class="font-italic text--secondary">{{ peintre.prenom }} {{ peintre.nom }}</footer>
        </blockquote>
      </v-col>
    </v-row>
  </v-parallax>
</template>

<script>
import axios from "axios";

export default {
  name: "Apropos",

  data() {
    return {
      peintre: {},
    };
  },

  async created() {
    const response = await axios.get("http://localhost:8000/a_propos");
    console.log(response);
    this.peintre = response.data;
  },
};
</script>
