
<template>
  <div>

    <div id="noprintable">
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
                    <div  class="mt-2 mx-auto ">
                      <button v-if="product.quantite > 0" @click="ajoutAuPanier(product)"
                        class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                        <ShoppingCartIcon class="mr-2 h-6 w-5 text-white"
                        aria-hidden="true" />Ajouter au panier</button>
                      <button v-else disabled
                        class=" flex w-full items-center justify-center rounded-md border border-transparent bg-gray-400 px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400">
                        <NoSymbolIcon class="mr-2 h-6 w-5 text-white"
                        aria-hidden="true" />Rupture de stock</button>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
          
        </div>
  
        <!-- Right column -->
        <div class="grid grid-cols-1 gap-4">
          <section aria-labelledby="section-2-title">
            <h2 class="sr-only" id="section-2-title">Section title</h2>
            <div class="overflow-hidden rounded-lg bg-white">
              <div class="p-6 ">
                <!-- Your content -->
                <PanierProduitsVue :articlePanier="articlePanier" :total="total" @majProduit="majProduit" @majTotal="majTotal"  @methodePaie="methodePaie" :ticketCaisse={ticketCaisse}  /> 
              </div>
            </div>
          </section>
        </div>
  
      </div>
    </div>


    <!-- Modal Impression Ticket -->
    <TransitionRoot as="template" :show="openTicket">
        <Dialog as="div" class="relative z-10" @close="openTicket = false">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="print-only">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                      <CheckIcon class="h-6 w-6 text-green-600" aria-hidden="true" />
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                      <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">Paiement validé</DialogTitle>
                      <div class="mt-2">
                        <TicketCaisseVue :clientTicket="clientTicket" />
                      </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                    <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 sm:col-start-2" @click="imprimerTicket()">Imprimer le ticket</button>
                    <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0" @click="closeTicket()" ref="cancelButtonRef">Fermer</button>
                </div>
                </DialogPanel>
            </TransitionChild>
            </div>
          </div>
        </Dialog>
      </TransitionRoot>
  </div>
</template>

<script setup>
import {  computed, onMounted, ref } from 'vue';
import PanierProduitsVue from '../components/PanierProduits.vue';
import TicketCaisseVue from '../components/TicketCaisse.vue'
import {CheckIcon, MagnifyingGlassIcon, ShoppingCartIcon, NoSymbolIcon } from '@heroicons/vue/20/solid';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'


const openTicket = ref(false)
const query = ref('')
const products = ref([]);
const articlePanier = ref([]);
const total = ref(0);

// const emit = defineEmits('total-panier')

const searchTerm = ref('');
const moyenPaie = ref('');
const clientTicket = ref({});

const getProducts = async () => {
  const response = await fetch('http://localhost:8000/api/produits');
  products.value = await response.json();
}

const searchProducts = () => {
  return filteredProducts.value = products.value.filter((product) => {
    return product.reference.toLowerCase().includes(searchTerm.value.toLowerCase());
  });
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

  
  total.value = articlePanier.value.reduce((acc, product) => acc + product.prix * product.quantite, 0);
  
  // emit('total-panier');
}

const majTotal = () => {
  
  total.value = articlePanier.value.reduce((acc, product) => acc + product.prix * product.quantite, 0);
  console.log(total.value, "TOTAL APRES AJOUT AU PANIER")

}

const methodePaie = (moyen) => {
  moyenPaie.value = moyen.title ;
}

clientTicket.value = {
    produits: [],
    
  };
console.log(clientTicket.value, "MONTRE MOI L'INFO 0000");

const majProduit = async (info) =>{
  await getProducts()
  
  clientTicket.value = {
    produits: [],
    
  };
  console.log(clientTicket.value, "MONTRE MOI L'INFO 1111");
  
  articlePanier.value = [];
  majTotal()
  
  clientTicket.value = info;
  console.log(clientTicket.value, "MONTRE MOI L'INFO 2222");


   openTicket.value = true;
}


const imprimerTicket = () => {
  // window.print();
  
  document.getElementById('noprintable').className = 'no-print';
  
  
  const link = document.createElement('link');
  link.href = 'src/assets/print.css';
  link.rel = 'stylesheet';
  
  document.head.appendChild(link);
  
  link.onload = () => {
    window.print();
    
    document.head.removeChild(link);
    document.getElementById('noprintable').className = '';
  };
} 


const closeTicket = () => {
  
  
  clientTicket.value = {
    produits: [],
    
  };
  
  console.log(clientTicket.value, "VALEUR FINALE")

  // articlePanier.value = [];
  // total.value = 0;
  
  openTicket.value = false
}

onMounted(async () => {
  await getProducts();
})

const filteredProducts = computed(searchProducts);

</script>

<style scoped>
.no-print {
  display: none;
}
</style>
