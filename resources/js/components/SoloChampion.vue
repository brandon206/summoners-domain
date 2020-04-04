<template>
  <div>
    <v-app style="background-color: #D9E4EC">
      <v-container fluid>
        <div>
          <div class="text-center" v-if="loading">
            <v-progress-circular
              :size="100"
              color="primary"
              indeterminate
            ></v-progress-circular>
          </div>
          <div v-else>
            <div style="margin: 0 auto; max-width:600px" class="my-2">
              <v-btn medium color="primary" @click="goBack">Back</v-btn>
            </div>
            <v-card
              class="mx-auto mt-4"
              max-width="600px"
              dark
              tile
              style="
                border-radius: 4px 4px 0px 0px;
                background: url(https://summoners-domain.s3-us-west-2.amazonaws.com/tft-background.jpg) no-repeat 50%;
                background-size: cover;
              "
            >
              <div class="d-flex flex-no-wrap">
                <v-avatar
                  class="ma-3"
                  size="85"
                  tile
                >
                  <v-img :src="champion.champion_image"></v-img>
                </v-avatar>
                <div>
                  <v-card-title
                    class="headline font-weight-bold"
                    v-text="champion.name"
                  ></v-card-title>
                  <v-card-text>
                    <div style="font-weight: 700">
                      Cost:<v-icon 
                      style="vertical-align: middle"
                      color="amber darken-1"
                      medium
                    >mdi-currency-usd-circle</v-icon>{{ champion.cost }}
                    </div>
                    <div style="font-weight: 700">
                      Mana:<v-icon 
                        style="vertical-align: middle"
                        color="blue darken-1"
                        medium
                      >mdi-flask-empty</v-icon><span style="font-size: 1rem;">{{ champion.champion_start_mana }}</span> / {{ champion.champion_full_mana }}
                    </div>
                    <div style="font-weight: 700"
                      v-for="(trait, i) in champion.traits"
                      :key="i"
                    >
                      <v-avatar
                        size="35"
                        tile
                      >
                        <v-img :src="trait.trait_icon" alt=""></v-img>
                      </v-avatar>
                      <span>{{ trait.trait }}</span>
                    </div>
                  </v-card-text>
                </div>
              </div>
            </v-card>
            <v-card
              class="mx-auto"
              color="light"
              max-width="600px"
              tile
            >
              <div>
                <v-card-title
                  class="headline font-weight-bold"
                >
                  <span 
                    style="border-bottom: 4px solid #1976d2"
                  >
                    Champion Stats:
                  </span>
                </v-card-title>
                <v-card-text class="font-weight-bold">
                  <div>Health: {{ champion.hp_lvl_1 }} / {{ champion.hp_lvl_2 }} / {{ champion.hp_lvl_3 }}</div>
                  <div>Attack Damage: {{ champion.atk_dmg_lvl_1 }} / {{ champion.atk_dmg_lvl_2 }} / {{ champion.atk_dmg_lvl_3 }}</div>
                  <div>Attack Speed: {{ champion.attack_speed  }}</div>
                  <div>DPS: {{ champion.dps_lvl_1 }} / {{ champion.dps_lvl_2 }} /  {{ champion.dps_lvl_3 }}</div>
                  <div>Armor: {{ champion.armor }}</div>
                  <div>Magic Resist: {{ champion.magic_resist }}</div>
                  <div>Range: {{ champion.champion_range }}</div>
                  <div style="text-align: right"><small>*stats with three values define stats for each star level</small></div>
                </v-card-text>
              </div>
            </v-card>
            <v-card
              class="mx-auto"
              color="light"
              max-width="600px"
              tile
            >
              <div>
                <v-card-title
                  class="headline font-weight-bold"
                >
                  <span 
                    style="border-bottom: 4px solid #1976d2"
                  >
                    Ability:
                  </span>
                </v-card-title>
              </div>
              <div class="d-flex flex-no-wrap">
                <v-avatar
                  class="ma-3"
                  size="85"
                  tile
                >
                  <v-img :src="champion.ability.image"></v-img>
                </v-avatar>
                <div>
                  <v-card-title class="headline">{{ champion.ability.name }}</v-card-title>
                  <v-card-subtitle>
                    <div>
                      <span v-if="champion.champion_full_mana !== 0">
                        Active
                      </span>
                      <span v-else>Passive</span>
                      <span class="ml-1" style="font-size: 1.2rem"> | </span>
                      <v-icon 
                        style="vertical-align: middle"
                        color="blue darken-1"
                        medium
                      >mdi-flask-empty</v-icon>
                      <v-tooltip right>
                        <template v-slot:activator="{ on }">
                          <span v-on="on">Mana: {{ champion.champion_start_mana }}/{{ champion.champion_full_mana }}</span>
                        </template>
                        <span>First number is starting mana, second is full mana</span>
                      </v-tooltip>
                    </div>
                  </v-card-subtitle>
                  <v-card-text>
                    <div>
                      {{ champion.ability.description }}
                    </div>
                    <div class="font-weight-bold">
                      {{champion.ability.ability_stat_1}}: {{ champion.ability.ability_stat_1_lvl_1 }} / {{ champion.ability.ability_stat_1_lvl_2 }} / {{ champion.ability.ability_stat_1_lvl_3 }}
                    </div>
                    <div v-if="champion.ability.ability_stat_2" class="font-weight-bold">
                      {{champion.ability.ability_stat_2}}: {{ champion.ability.ability_stat_2_lvl_1 }} / {{ champion.ability.ability_stat_2_lvl_2 }} / {{ champion.ability.ability_stat_2_lvl_3 }}
                    </div>
                    <div v-if="champion.ability.ability_stat_3" class="font-weight-bold">
                      {{champion.ability.ability_stat_3}}: {{ champion.ability.ability_stat_3_lvl_1 }} / {{ champion.ability.ability_stat_3_lvl_2 }} / {{ champion.ability.ability_stat_3_lvl_3 }}
                    </div>
                    <div style="text-align: right"><small>*stats with three values define stats for each star level</small></div>
                  </v-card-text>
                </div>
              </div>
            </v-card>
            <v-card
              class="mx-auto mb-4"
              color="light"
              max-width="600px"
              tile
              style="border-radius: 0px 0px 4px 4px"
            >
              <div>
                <v-card-title
                  class="headline font-weight-bold"
                >
                  <span 
                    style="border-bottom: 4px solid #1976d2"
                  >
                    Traits:
                  </span>
                </v-card-title>
              </div>
              <div class="d-flex flex-no-wrap"
                v-for="(trait, i) in champion.traits"
                :key="i"
              >
                <v-avatar
                  class="ma-3"
                  size="85"
                  tile
                >
                  <v-img :src="trait.trait_icon"></v-img>
                </v-avatar>
                <div>
                  <v-card-title class="headline">{{ trait.trait }}</v-card-title>
                  <v-card-subtitle>
                    <div>
                      <span class="text-capitalize">{{ trait.type }}</span>
                    </div>
                  </v-card-subtitle>
                  <v-card-text>
                    <div>
                      {{ trait.description }}
                    </div>
                    <div v-if="trait.bronze_set">
                      <div 
                        class="brown--text font-weight-bold"
                        style="width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        font-size: 14px;
                        color: #fff;
                        line-height: 17px;
                        text-align: center;
                        border: 2px solid #795548;
                        vertical-align: top;
                        display: inline-block;"
                      >
                        {{ trait.bronze_set }}
                      </div>
                      <div class="font-weight-bold" style="display: inline-block;">: {{ trait.bronze_ability }}</div>
                    </div>
                    <div v-if="trait.silver_set">
                      <div 
                        class="blue-grey--text text--lighten-2 font-weight-bold"
                        style="width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        font-size: 14px;
                        color: #fff;
                        line-height: 17px;
                        text-align: center;
                        border: 2px solid #90A4AE;
                        vertical-align: top;
                        display: inline-block;"  
                      >
                        {{ trait.silver_set }}
                      </div>
                      <div class="font-weight-bold" style="display: inline-block">: {{ trait.silver_ability }}</div>
                    </div>
                    <div v-if="trait.gold_set">
                      <div 
                        class="amber--text text--accent-3 font-weight-bold"
                        style="width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        font-size: 14px;
                        color: #fff;
                        line-height: 17px;
                        text-align: center;
                        border: 2px solid #FFC400;
                        vertical-align: top;
                        display: inline-block;"
                      >
                        {{ trait.gold_set }}
                      </div>
                      <div class="font-weight-bold" style="display: inline-block;">: {{ trait.gold_ability }}</div>
                    </div>
                  </v-card-text>
                  <v-divider></v-divider>
                </div>
              </div>
            </v-card>
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
      loading: false,
      id: null,
      champion: null,
    };
  },
  created() {
    this.id = this.$route.params.id;
    this.loading = true;
    const request = axios
      .get(`/api/champions/${this.id}`)
      .then(response => {
        this.champion = response.data;
        console.log('champion:', response.data);
        this.loading = false;
      })
  },
  methods: {
    goBack() {
      this.$router.go(-1);
    },
  },
}
</script>

<style>

</style>