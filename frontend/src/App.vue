<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import NavBar from './components/NavBar.vue';
</script>

<template>
  <header class="sticky">
    <!-- <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" /> -->

    <!-- <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <RouterLink to="/produit">Produits</RouterLink>
      </nav>
    </div> -->
    <NavBar />
  </header>

  <RouterView />
</template>

<style scoped>

</style>
