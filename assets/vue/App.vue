<template>
  <div>
    <nav>
      <router-link to="/home">
        App
      </router-link>
    </nav>

    <router-view />

  </div>
</template>

<script>
  export default {
    name: "App",
  }
</script>