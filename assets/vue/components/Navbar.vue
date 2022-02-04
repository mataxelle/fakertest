<template>
  <v-app-bar app elevation="0">
    <v-subheader><h1 class="brown--text">Peinture</h1></v-subheader>
    <v-tabs
      center-active
      right
      background-color="transparent"
      active-class="active-tab"
    >
      <v-tab href="/">Réalisations</v-tab>
      <v-tab href="#actualites">Actualités</v-tab>
      <v-tab href="#">Portfolio</v-tab>
      <v-tab href="#">A propos</v-tab>
      <v-tab href="#">Contact</v-tab>
    </v-tabs>
  </v-app-bar>
</template>

<script>
export default {};
</script>

<style>
</style>
