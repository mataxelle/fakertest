<template>
  <v-footer dark padless>
    <v-card class="flex" flat tile>
      <v-card-title class="brown lighten-1">
        <strong class="subheading">
            Allons jusqu'au bout !
        </strong>

        <v-spacer></v-spacer>

        <v-btn v-for="icon in icons" :key="icon" class="mx-4" dark icon>
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center">
        {{ new Date().getFullYear() }} — <strong>Peinture</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {
  name: "Footer",

  data: () => ({
    icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
  }),
};
</script>
