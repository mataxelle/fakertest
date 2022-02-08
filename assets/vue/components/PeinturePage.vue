<template>
    <div>{{ peinture.nom }}</div>
</template>

<script>
import axios from "axios"

export default {
    name: "PeinturePage",

    data() {
        return {
            peinture: {}
        }
    },

    async created() {
        const response = await axios.get(`http://localhost:8000/peinture/show/${this.$route.params.id}`);
        this.peinture = response.data;
    }
}
</script>