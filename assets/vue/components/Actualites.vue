<template>
  <div>
    <section id="actualites" class="py-16">
      <v-card max-width="80%" class="mx-auto px-5" >
        <v-row>
          <v-col v-for="(item, i) in items" :key="i">
            <v-card>
              <v-card-text>
                <p class="text-h4 text--primary">Titre actu</p>
                <p v-text="item.title"></p>
                <div class="text--primary">
                  well meaning and kindly.<br />
                  "a benevolent smile"
                </div>
              </v-card-text>
              <v-card-actions>
                <v-btn text color="deep-purple accent-4"> Learn More </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-card>
    </section>
  </div>
</template>

<script>
export default {
  name: "Actualites",

  data: () => ({
    items: [
      {
        title: "Supermodel",
      },
      {
        title: "Halcyon Days",
      },
      {
        title: "Marche aux arts",
      },
    ],
  }),
};
</script>
