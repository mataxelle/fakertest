<template>
  <div>
    <section class="py-16">
      <v-row>
        <v-col v-for="(item, i) in items" :key="i" cols="12">
          <v-card max-width="600" height="250px" class="mx-auto">
            <div class="d-flex flex-no-wrap justify-space-between">
              <div>
                <v-card-title
                  class="text-h5"
                  v-text="item.title"
                ></v-card-title>

                <v-card-subtitle></v-card-subtitle>

                <v-card-actions>
                  <v-btn outlined rounded small>
                    Peinture
                  </v-btn>
                </v-card-actions>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </section>
  </div>
</template>

<script>
export default {
  name: "Peintures",

  data: () => ({
    items: [
      {
        title: "Supermodel",
      },
      {
        title: "Halcyon Days",
      },
      {
        title: "Supermodel",
      },
      {
        title: "Halcyon Days",
      },
    ],
  }),
};
</script>
