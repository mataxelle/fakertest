<template>
  <v-app>
    <v-parallax
      dark
      src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
    >
      <v-row align="center" justify="center">
        <v-col class="text-center" cols="12">
          <h1 class="text-h4 font-weight-thin mb-4">Découvrez</h1>
          <h4 class="subheading">Les peintures d'un artiste passionné</h4>
        </v-col>
      </v-row>
    </v-parallax>
    <Peintures />
    <Actualites />
  </v-app>
</template>

<script>
import Peintures from "../components/Peintures";
import Actualites from "../components/Actualites";

export default {
  name: "Home",

  components: {
    Peintures,
    Actualites,
  },
};
</script>
