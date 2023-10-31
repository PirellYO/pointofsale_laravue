<template>
    <div class="px-4">
    <!-- Sticky search header -->
      <div class="rounded-xl justify-between sticky top-0 z-10 flex h-12 shrink-0 items-center gap-x-6  text-white   ">
        <h2 class="font-bold text-lg text-gray-600">🖖🏽 Ravie de vous revoir, Pirelly</h2>
        <div class="flex gap-x-5">
                <!-- <button type="button" class="mt-3  w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Historique  ventes</button>
                <button type="button" class="mt-3  w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Historique Paiement</button> -->
                <RouterLink to="/">
                  <span class="flex text-blue-600 font-bold"><RectangleGroupIcon class="mr-2 h-6 w-6" aria-hidden="true" /><span class="hidden md:flex">Boutique</span></span>
                </RouterLink>
                <RouterLink to="/ventes">
                  <span class="flex text-blue-600 font-bold"><SwatchIcon class="mr-2 h-6 w-6" aria-hidden="true" /><span class="hidden md:flex">Liste des ventes</span></span>
                </RouterLink>
                <RouterLink to="/paiements">
                  <span class="flex text-blue-600 font-bold"><CreditCardIcon class="mr-2 h-6 w-6 " aria-hidden="true" /><span class="hidden md:flex">Listes des paiements</span></span>
                </RouterLink>
        </div>
      </div>
    </div>
</template>

<script setup>
import { CreditCardIcon, SwatchIcon, RectangleGroupIcon } from '@heroicons/vue/20/solid'
import { RouterLink } from 'vue-router';


</script>