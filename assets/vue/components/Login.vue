<template>
  <v-container class="my-16" fluid>
    <v-row>
      <v-col cols="12" sm="8" md="4" lg="4" class="mx-auto">
        <p class="text-h4 text-center">Connexion</p>
        <v-card elevation="0">
          <v-card-text>
            <v-form>
              <v-text-field
                v-model="email"
                label="email"
                name="email"
                prepend-inner-icon="mdi-email"
                type="email"
                class="rounded-0"
                outlined
              ></v-text-field>
              <v-text-field
                v-model="password"
                label="password"
                name="password"
                prepend-inner-icon="mdi-lock"
                type="password"
                class="rounded-0"
                outlined
              ></v-text-field>
              <v-btn @click="login" class="rounded-0" color="#000000" x-large block dark
                >Connexion</v-btn
              >
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Login",

  data() {
    return {
      email: " ",
      password: " ",
    };
  },

  methods: {
    async login() {
      try {
        await axios.post("http://localhost:8000/login", {
          email: this.email,
          password: this.password,
        });
        //this.$router.push({ name: "Home" });
        console.log(email, password);
      } catch (e) {
        this.errors.push(e);
      }
    },
  },
};
</script>
