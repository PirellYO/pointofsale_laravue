
<template>
  <div>
    <!-- Main 3 column grid -->
    <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
      <!-- Left column -->
      <div class="grid grid-cols-1 gap-4 lg:col-span-2">
        <!-- <NavBar /> -->

        <div class="px-4 pt-4">
          <!-- Sticky search header -->
          <div
            class="rounded-xl sticky top-0 z-10 flex h-12 shrink-0 items-center gap-x-6 border-b border-white/5 bg-gray-200 text-white px-4 shadow-sm sm:px-6 lg:px-8">

            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
              <form class="flex flex-1" action="#" method="GET">
                <label for="search-field" class="sr-only">Search</label>
                <div class="relative w-full">
                  <MagnifyingGlassIcon class="pointer-events-none absolute inset-y-0 left-0 h-full w-5 text-gray-700"
                    aria-hidden="true" />
                  <input v-model="searchTerm" @input="searchProducts" @change="query = $event.target.value" id="search-field" class="block h-full w-full border-0 bg-transparent py-0 pl-8 pr-0 text-gray-700 focus:ring-0 sm:text-sm " placeholder="Rechercher..." type="search" name="search" />
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- <Suspense> -->
          <section aria-labelledby="section-1-title">
          <div class="bg-white">
            <div class="max-w-2xl px-4 py-2 sm:px-6 sm:py-2 lg:max-w-5xl lg:px-8">
              <h2 class="sr-only">Products</h2>

              <div v-if="filteredProducts"
                class="grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a v-for="product in filteredProducts" :key="product.id" :href="product.href" class="group">
                  <div
                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                    <img :src="product.image" :alt="product.image"
                      class="h-full w-full object-cover object-center group-hover:opacity-75" />
                  </div>
                  <h3 class="mt-2 text-sm font-semibold text-gray-500">{{ product.reference }} - <span
                      class="mt-1 text-base font-bold text-gray-700">{{ product.designation }}</span></h3>
                  <div class="mt-1 flex justify-between">
                    <p class="text-base font-bold text-blue-700">{{ product.prix }} F</p>
                    <p class="text-sm font-medium text-gray-500">En stock: <span
                        class="text-sm font-bold text-gray-500">{{ product.quantite }}</span></p>
                  </div>
                  <div class="mt-2 mx-auto ">
                    <button @click="ajoutAuPanier(product)"
                      class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                      <ShoppingCartIcon class="mr-2 h-6 w-5 text-white"
                      aria-hidden="true" />Ajouter au panier</button>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>

          <!-- <template #fallback>
            Chargement...
          </template>

        </Suspense> -->
        


        
      </div>

      <!-- Right column -->
      <div class="grid grid-cols-1 gap-4">
        <section aria-labelledby="section-2-title">
          <h2 class="sr-only" id="section-2-title">Section title</h2>
          <div class="overflow-hidden rounded-lg bg-white">
            <div class="p-6 ">
              <!-- Your content -->
              <PanierProduitsVue :articlePanier="articlePanier" :total="total" @majProduit="majProduit" />
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script setup>
import {  computed, onMounted, ref } from 'vue';
import PanierProduitsVue from '../components/PanierProduits.vue';
import { MagnifyingGlassIcon, ShoppingCartIcon } from '@heroicons/vue/20/solid';


const query = ref('')
const products = ref([]);
const articlePanier = ref([]);
const total = ref(0);

const emit = defineEmits('')

const searchTerm = ref('');

const getProducts = async () => {
  const response = await fetch('http://localhost:8000/api/produits');
  products.value = await response.json();
}

const searchProducts = () => {
  return filteredProducts.value = products.value.filter((product) => {
    return product.reference.toLowerCase().includes(searchTerm.value.toLowerCase());
  });
}

const majProduit = async () =>{
  await getProducts()
}


const ajoutAuPanier = (product) => {
  const indexProduit = articlePanier.value.findIndex((p) => p.reference === product.reference);

  if (indexProduit !== -1) {
    // Le produit existe déjà dans le panier
    articlePanier.value[indexProduit].quantite += 1; // Mettre à jour la quantité
  } else {
  const produitPanier = {...product, quantite: 1};
  articlePanier.value.push(produitPanier);
  }

  emit('total-panier');
}

onMounted(async () => {
  await getProducts();
})

const filteredProducts = computed(searchProducts);


</script>
