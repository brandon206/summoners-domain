<template>
  <div>
    <v-container fluid>
      <v-row
        align="center"
        justify="center"
        style="height: 70vh;"
      >
        <v-col>
          <!-- Insert Summoner's Domain Image Here -->
          <v-img
            class="mx-auto" max-width="344"
            src="https://picsum.photos/510/300?random"
            aspect-ratio="1.7"
          ></v-img>
          <v-card class="mx-auto" max-width="344" raised>
            <v-list-item three-line>
              <v-list-item-content>
                <div class="overline mb-4">Search Summoner</div>
                <v-text-field
                  label="Summoner Name"
                  solo
                  dense
                  required
                  append-outer-icon="search"
                  clearable
                ></v-text-field>
              </v-list-item-content>
            </v-list-item>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
