<template>
  <v-app>
    <div>
      <!-- <Navbar/> -->
      <!-- <v-toolbar dense>
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-toolbar-title>
          <router-link :to="{ name: 'home'}">Home</router-link>
        </v-toolbar-title>
        <v-spacer></v-spacer>

        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>

        <v-btn icon>
          <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn icon>
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
      </v-toolbar> -->
      <v-tabs>
        <v-tab>
          <router-link :to="{ name: 'home'}">Home</router-link>
        </v-tab>
        <v-tab>
          <router-link :to="{ name: 'home'}">Champions</router-link>
        </v-tab>
        <v-tab>
          <router-link :to="{ name: 'home'}">Items</router-link>
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
import NavBar from './components/Navbar';
export default {
  
};
</script>

<style>
</style>