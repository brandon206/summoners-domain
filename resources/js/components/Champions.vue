<template>
  <div>
    <v-app style="background-color: #D9E4EC">
      <v-container fluid>
        <div>
          <div style="text-align: center; padding: 10px 0px;">
            <v-list-item-title class="display-3">Champions</v-list-item-title>
          </div>
          <div class="text-center" v-if="loading">
            <v-progress-circular
            :size="50"
            color="primary"
            indeterminate
            ></v-progress-circular>
            <p class="headline">Data is loading...</p>
          </div>
          <div v-else>
            <v-container>
              <v-row dense>
                <v-col
                  v-for="(champion, i) in champions"
                  :key="i"
                  align="center"
                  justify="center"
                  cols="6"
                  sm="4"
                  md="3"
                  lg="2"
                >
                  <v-card
                    :class="`champion-card-${dynamicBgColor(champion.cost)}`"
                    light
                    hover
                    :to="{ name: 'champions.id', params: {id: champion.id } }"
                    :style="`border: 2px solid ${fillColor(champion.cost)}`"
                  >
                    <v-avatar
                      class="ma-3"
                      align="center"
                      tile
                      style="border-radius: 4px;"
                    >
                      <v-img :src="champion.champion_image"></v-img>
                    </v-avatar>
                    <div class="d-flex flex-no-wrap justify-space-between">
                      <div style="margin: 0 auto;">
                        <v-list-item-content style="padding: 0px;">
                          <v-list-item-title class="headline mb-1">{{ champion.name }}</v-list-item-title>
                          <v-list-item-subtitle class="title">{{ `Cost: ${champion.cost}` }}</v-list-item-subtitle>
                        </v-list-item-content>
                      </div>
                    </div>
                      <v-list-item-content class="traits-container">
                        <v-list-item-title
                        v-for="(trait, i) in champion.traits"
                        :key="i"
                        v-text="trait"></v-list-item-title>
                      </v-list-item-content>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </div>
      </v-container>
    </v-app>
  </div>
</template>

<script>
export default {
  data() {
    return {
      champions: null,
      loading: false,
      traits: '',
    }
  },
  methods: {
    fillColor(cost) {
      let color;
      switch (cost) {
        case 1: {
          color = "#757575";
          break;
        }
        case 2: {
          color = "#43A047";
          break;
        }
        case 3: {
          color = "#3949AB";
          break;
        }
        case 4: {
          color = "#D81B60";
          break;
        }
        case 5: {
          color = "#FFB300";
          break;
        }
      }
      return color;
    },
    dynamicBgColor(cost) {
      let color;
      switch (cost) {
        case 1: {
          color = 'grey';
          break;
        }
        case 2: {
          color = 'green';
          break;
        }
        case 3: {
          color = 'indigo';
          break;
        }
        case 4: {
          color = 'pink';
          break;
        }
        case 5: {
          color = 'amber';
          break;
        }
      }
      return color;
    },
  },
  created() {
    this.loading = true;
    const request = axios
      .get("/api/champions")
      .then(response => {
        this.champions = response.data;
        this.loading = false;
      })
  },
}
</script>

<style lang="scss" scoped>
.champion-card {
  &-grey:hover {
    border: 1px solid white;
    background-color: #E0E0E0;
  }
  &-green:hover {
    border: 1px solid white;
    background-color: #81C784;
  }
  &-indigo:hover {
    border: 1px solid white;
    background-color: #7986CB;
  }
  &-pink:hover {
    border: 1px solid white;
    background-color: #F06292;
  }
  &-amber:hover {
    border: 1px solid white;
    background-color: #FFD54F;
  }

}
.traits-container {
  min-height: 80px;
}
</style>