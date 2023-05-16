<script setup>
import { RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue';
import moment from 'moment';
import 'moment/dist/locale/fr';


moment.locale('fr')
</script>

<template>
  <header>
    <NavBar />
  </header>

  <RouterView />

</template>
