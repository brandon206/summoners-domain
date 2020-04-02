<template>
  <v-app>
    <div>
      <!-- <Navbar/> -->
      <v-tabs 
        dark
        background-color="#385E72"
        color="white"
      >
        <v-tab :to="{ name: 'home'}" exact>
          Home
        </v-tab>
        <v-tab :to="{ name: 'champions'}">
          Champions
        </v-tab>
        <v-tab :to="{ name: 'items'}">
          Items
        </v-tab>
      </v-tabs>
      <!-- End Navbar -->
      <div>
        <router-view></router-view>
      </div>
    </div>
  </v-app>
</template>

<script>
export default {

};
</script>

<style>
</style>