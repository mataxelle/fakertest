<template>
  <div>
    <Parallax />
    <v-container>
      <Peintures />
      <Actualites />
    </v-container>
  </div>
</template>

<script>
import Parallax from "../components/Parallax";
import Peintures from "../components/Peintures";
import Actualites from "../components/Actualites";

export default {
  name: "Home",

  components: {
    Parallax,
    Peintures,
    Actualites,
  },
};
</script>
