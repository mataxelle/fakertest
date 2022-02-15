<template>
    <v-container class="my-16" fluid>
        <v-row>
          <v-col cols="12" sm="8" md="4" lg="4" class="mx-auto">
            <p class="text-h4 text-center">Me contacter</p>
            <v-card elevation="0">
              <v-card-text>
                <v-form>
                  <v-text-field label="nom" name="nom" prepend-inner-icon="mdi-rename-box" type="text" class="rounded-0" outlined></v-text-field>
                  <v-text-field label="email" name="email" prepend-inner-icon="mdi-email" type="email" class="rounded-0" outlined></v-text-field>
                  <v-textarea label="message" name="message" prepend-inner-icon="mdi-message-text" type="text" class="rounded-0" outlined></v-textarea>
                  <v-btn class="rounded-0" color="#000000" x-large block dark>Envoyer</v-btn>
                </v-form>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
</template>

<script>
import axios from "axios"

export default {
    name: "Contact",
}
</script>