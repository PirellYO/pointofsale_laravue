<template>
    <!-- Recent activity table -->
    <div>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
          <h2 class="mx-auto max-w-2xl text-xl font-bold leading-6 text-gray-700 lg:mx-0 lg:max-w-none">Liste des paiements</h2>
        </div>
        <div class="mt-2 mx-auto overflow-hidden border-t border-gray-100">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-6">
            <div class="mx-auto max-w-2xl  lg:mx-3 lg:max-w-none">
              <table class="w-full text-left p-5">
                <thead class="bg-gray-200 rounded-lg">
                  <tr>
                    <th class="p-2">Numéro</th>
                    <th class="">Montant</th>
                    <th class="p-2">Détails du paiement</th>
                  </tr>
                </thead>
                <tbody>
                    <tr v-for="transaction in paiements" :key="transaction.id">
                      <td class="relative px-3 py-2 pr-6">
                        <div class="flex gap-x-2 items-center">
                            
                          <div class="flex-auto">
                            <div class="flex items-center gap-x-3">
                              <div class="text-sm font-bold leading-normal text-blue-700"><span class="text-gray-600">#</span>{{ transaction.numero }}</div>
                              <!-- <div class="text-green-700 bg-green-50 ring-green-600/20 rounded-lg py-1 px-2 text-xs font-medium ring-1 ring-inset">Payé</div> -->
                            </div>
                            <!-- <div v-if="transaction.tax" class="mt-1 text-xs leading-5 text-gray-500">{{ transaction.tax }} tax</div> -->
                          </div>
                        </div>
                        <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100" />
                        <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100" />
                      </td>
                      <td class="py-2 pr-6">
                        <div class="text-sm leading-6 font-bold text-gray-700">{{ transaction.montant }} F</div>
                        <!-- <div class="text-xs text-gray-500">{{ transaction.moyen_paiement }}</div> -->
                      </td>
                      <td class="py-2 ">
                        <div class="flex pl-4">
                          <span class="text-sm font-semibold leading-6 text-indigo-600 hover:text-blue-500">
                            <span class="font-mono">{{ transaction.moyen_paiement }}</span>
                            </span>
                        </div>
                        <div class="mt-1 pl-4 text-sm font-medium leading-5 text-gray-500">
                          Vente <span class="text-gray-900 font-bold">#{{ transaction.numero_vente }}</span>
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</template>

<script setup>
import { onMounted, ref } from "vue";



const paiements = ref();

onMounted(async () => {
    try {
        const response = await fetch('http://localhost:8000/api/paiements');
        if (response.ok) {
        const data = await response.json();
        paiements.value = data;
        } else {
        throw new Error('Une erreur s\'est produite lors de la récupération des paiements');
        }
    } catch (error) {
        console.error(error);
    }
})

</script>