<template>
  <v-app-bar app elevation="0">
    <v-subheader><h1 class="brown--text">Peinture</h1></v-subheader>
    <v-tabs
      center-active
      right
      background-color="transparent"
      active-class="active-tab"
    >
      <v-tab :to="{ name: 'home' }">Réalisations</v-tab>
      <v-tab :to="{ name: 'actualites' }">Actualités</v-tab>
      <v-menu bottom left>
        <template v-slot:activator="{ on, attrs }">
          <v-tab
            :to="{ name: 'portfolio' }"
            v-bind="attrs"
            v-on="on"
          >
            Portfolio
            <v-icon right> mdi-menu-down </v-icon>
          </v-tab>
        </template>

        <v-list class="grey lighten-3">
          <v-list-item v-for="link in navbarLinks" :key="link.id"
          :to="{ name: 'categorie', params: { slug: link.slug } }"> 
            {{ link.nom }} 
          </v-list-item>
        </v-list>
      </v-menu>
      <v-tab :to="{ name: 'a_propos' }">A propos</v-tab>
      <v-tab href="#">Contact</v-tab>
    </v-tabs>
  </v-app-bar>
</template>

<script>
import axios from "axios"

export default {
  name: "Navbar",

  data() {
    return {
      navbarLinks: {}
    }
  },

  async created() {
    const response = await axios.get("http://localhost:8000/portfolio");
    this.navbarLinks = response.data;
  }
};
</script>

<style></style>
