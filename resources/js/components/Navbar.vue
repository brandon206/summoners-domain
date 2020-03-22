<template>
<!-- <v-app> -->
  <v-toolbar dense>
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
  </v-toolbar>
<!-- <v-app> -->
</template>

<script>
export default {

}
</script>

<style>

</style>