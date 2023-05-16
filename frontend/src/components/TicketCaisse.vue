<template>
    <div class="items-center justify-center">
        <div class="mx-auto  max-w-3xl py-1 sm:px-6 sm:py-4 lg:px-2">
            <div class="mt-4">

                <div class="mx-auto inline-block min-w-min py-2 align-middle font-mono text-left sm:px-4 lg:px-6">
                    <table class="min-w-full divide-dashed divide-y divide-gray-600">
                        <thead>
                            <tr>
                                <th scope="col" class="py-2  pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Ref.</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Designation</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Montant
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TVA</th>

                            </tr>
                        </thead>
                        <tbody class="">
                            <tr v-for="item in clientTicket.produits" :key="item.id">
                                <td class="whitespace-nowrap py-2 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{
                                    item.produit.reference }}</td>
                                <td class="whitespace-nowrap px-3 text-sm text-gray-500 flex flex-col">
                                    <span>{{ item.produit.designation }} </span>
                                    <span>{{ item.produit.prix }} FCFA x {{ item.produit.quantite }}</span>
                                </td>
                                <td class="whitespace-nowrap px-3 text-sm text-gray-500">{{ item.produit.prix *
                                    item.produit.quantite }}</td>
                                <td class="whitespace-nowrap px-3 text-sm text-gray-500">1</td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td scope="col" class=" pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">TOTAL
                                </td>
                                <td colspan="3" scope="col"
                                    class="text-right  pr-3  text-sm font-semibold text-gray-900 sm:pl-0">{{
                                        clientTicket.montant }} FCFA</td>
                            </tr>
                            <tr>
                                <td scope="col" class=" pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">MOY.
                                    PAIEMENT</td>
                                <td colspan="3" scope="col"
                                    class="text-right  pr-3  text-sm font-semibold text-gray-900 sm:pl-0">{{
                                        clientTicket.moyen }}</td>
                            </tr>
                            <tr>
                                <td scope="col" class=" pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">NBRE DE
                                    PRODUITS</td>
                                <td colspan="3" scope="col"
                                    class="text-right  pr-3  text-sm font-semibold text-gray-900 sm:pl-0">{{
                                        clientTicket.produits.length }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="max-w-xl mt-4">
                    <h1 class="text-base font-normal font-mono text-gray-600 flex flex-col">
                        <span>Merci a vous!</span>
                        <span>A bientôt</span>
                        <span>{{ moment(new Date()).format('LLL') }}</span>
                    </h1>

                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import moment from 'moment';

const props = defineProps({
    clientTicket: {
        type: Object,
        required: true
    }
});


console.log(props, "GREAT");

</script>