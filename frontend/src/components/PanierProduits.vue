<template>
    <div class="inset-0 overflow-hidden">
        <div class="pointer-events-none relative lg:absolute inset-y-0 right-0 flex max-w-full">
            <div class="pointer-events-auto w-screen lg:max-w-sm xl:max-w-md md:p-4 md:pb-6">
                <div class="lg:mx-3 xl:mx-0 flex relative top-12 bottom-0 max-h-[calc(100%-4rem)] flex-col bg-gray-200 rounded-lg shadow-xl">
                    <div class="flex items-start px-4 py-3 sm:px-6 justify-between">
                        <h1 class="text-lg text-gray-900 font-bold">Panier</h1>
                    </div>
                    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                        <div v-if="articlePanier && articlePanier.length" class="">
                            <div class="flow-root">
                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                    <li v-for="product in articlePanier" :key="product.id" class="flex py-6">
                                        <div
                                            class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                            <img :src="product.image" :alt="product.image"
                                                class="h-full w-full object-cover object-center" />
                                        </div>

                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="#">{{ product.designation }}</a>
                                                    </h3>
                                                    <p class="ml-4">{{ product.prix }} F</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">{{ product.reference }}</p>
                                            </div>
                                            <div class="flex flex-1 items-center justify-between text-sm">
                                                <div class=" flex text-gray-500"> 
                                                    <span class="w-10">
                                                        <span class="flex flex-row h-8 w-14 rounded-lg relative bg-transparent mt-1">
                                                            <input type="number" 
                                                                class="focus:outline-none border-none text-center w-full bg-gray-300 font-semibold rounded-lg text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" 
                                                                v-model.number="product.quantite" min="1" @change="miseAJourQuantite(product)" />
                                                        </span>
                                                    </span>
                                                </div>
                                                
                                                <p class="text-gray-500"><span class="font-bold">Total :</span> {{ product.quantite * product.prix }} F</p>

                                                <div class="flex">
                                                    <button type="button" @click="supprimerDuPanier(product)"
                                                        class="font-medium text-indigo-600 hover:text-indigo-500">
                                                        <TrashIcon class="h-5 w-5 text-red-300" aria-hidden="true" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div v-else class="flex justify-center items-center m-auto">
                            <p class="text-gray-500 font-bold"> Votre panier est vide</p>
                        </div>
                    </div>

                    <div v-if="total > 0" class="border-t border-gray-200 px-4 py-6 sm:px-6">
                        <div class="flex justify-between text-lg font-medium text-gray-900">
                            <p>Total Panier :</p>
                            <p>{{ total }} F</p>
                        </div>
                        <div class="mt-6">
                            <button @click="faireVente(product)"
                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Payer</button>
                        </div>

                        <!-- Modal Paiement -->
                        <TransitionRoot as="template" :show="opene">
                            <Dialog as="div" class="relative z-10" @close="opene = false">
                            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                            </TransitionChild>

                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                    <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                                    <div>
                                        <!-- <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                                            <CheckIcon class="h-6 w-6 text-green-600" aria-hidden="true" />
                                        </div> -->
                                        <div class="mt-1 text-center">
                                            <DialogTitle as="h3" class="text-base font-bold leading-6 text-gray-900">Résumer du panier</DialogTitle>
                                            <div class="mt-2">
                                                <li v-for="ref in articlePanier" :key="ref.id"
                                                    class="cursor-default select-none flex rounded-md px-2 py-2 bg-white text-white">
                                                    <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img :src="ref.image" :alt="ref.image" class="h-full w-full object-cover object-center" />
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                            <p><span class="text-gray-500">{{ ref.reference }}</span> - {{ ref.designation }}</p>
                                                            </h3>
                                                            <p class="ml-4 text-blue-500">{{ ref.prix }} F</p>
                                                        </div>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">Quantité: {{ ref.quantite }}</p>

                                                        <div class="flex">
                                                            <!-- <button type="button" @click="supprimerDuPanier()"
                                                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                <TrashIcon class="h-5 w-5 text-red-300" aria-hidden="true" />
                                                            </button> -->
                                                        </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="mt-4 text-left"> 
                                                <div>
                                                    <label class="text-base font-semibold text-gray-900">Moyen de paiement</label>
                                                    <p class="text-sm text-gray-500">Veuillez sélectionner un moyen de paiement</p>
                                                    <fieldset class="mt-4">
                                                    <legend class="sr-only">Payment method</legend>
                                                    <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                                        <div v-for="moyen in paymentMethods" :key="moyen.id" class="flex items-center">
                                                            <input :id="moyen.id" name="payment-method" type="radio" :checked="selectedPaymentMethod === moyen" @change="selectPaymentMethod(moyen)" class="h-4 w-4 border-gray-300 text-indigo-600 " />
                                                            <label :for="moyen.id" class="ml-3 block text-sm font-medium leading-6 text-gray-900">{{ moyen.title }}</label>
                                                        </div>
                                                    </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="mt-6"> 
                                                <div class="flex justify-between text-lg font-medium text-gray-900">
                                                    <p>Total Panier :</p>
                                                    <p class="text-blue-600 text-xl">{{ total }} F</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-6">
                                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" @click="enregistrerPaiement()">Enregistrer le paiement</button>
                                    </div>
                                    </DialogPanel>
                                </TransitionChild>
                                </div>
                            </div>
                            </Dialog>
                        </TransitionRoot>

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
                                    <div>
                                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                                        <!-- <CheckIcon class="h-6 w-6 text-green-600" aria-hidden="true" /> -->
                                        </div>
                                        <div class="mt-3 text-center sm:mt-5">
                                        <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">Payment successful</DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius aliquam laudantium explicabo pariatur iste dolorem animi vitae error totam. At sapiente aliquam accusamus facere veritatis.</p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2" @click="openTicket = false">Deactivate</button>
                                        <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0" @click="openTicket = false" ref="cancelButtonRef">Cancel</button>
                                    </div>
                                    </DialogPanel>
                                </TransitionChild>
                                </div>
                            </div>
                            </Dialog>
                        </TransitionRoot>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, watch } from 'vue';

import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {  TrashIcon  } from '@heroicons/vue/20/solid'

const opene = ref(false);
const openTicket = ref(false);

const total = ref(0);

const props = defineProps({
    articlePanier: {
    type: Array,
    required: true
  }, 
});

const paymentMethods = [
  { id: 'cheque', title: 'CHEQUE' },
  { id: 'Carte', title: 'CRTE. BAN' },
  { id: 'espece', title: 'ESPECE' },
]

const venteId = ref();
const venteMontant = ref();

const selectedPaymentMethod = ref(null);

// Mettre à jour le total lorsque `articlePanier` change
watch(() => props.articlePanier, () => {
  calculerTotal();
});

const miseAJourQuantite = (product) => {
  // Vérifier si la quantité est supérieure à 0
  if (product.quantite <= 0) {
    // Supprimer le product du panier si la quantité est nulle ou négative
    supprimerDuPanier(product);
  } else {
    calculerTotal();
    
  }
};

const supprimerDuPanier = (product) => {
  const index = props.articlePanier.indexOf(product);
  if (index !== -1) {
    props.articlePanier.splice(index, 1);
    // Mettre à jour le total en recalculant la somme des produits dans le panier
    calculerTotal();
  }
};

const calculerTotal = () => {
  total.value = props.articlePanier.reduce((acc, product) => acc + product.prix * product.quantite, 0);
};

// Calculer le total initial lors de la création du composant
calculerTotal();

const faireVente = async () => {

    try {
        // Enregistrer la vente dans la table "vente"
    const venteResponse = await fetch('http://localhost:8000/api/ventes', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        // Inclure les données pertinentes de la vente, comme la date de création et le montant total
        date_creation: new Date().toISOString(),
        montant_total: total.value,

      }),
    });
    

    // Vérifier la réponse de la requête
    if (!venteResponse.ok) {
      throw new Error('Erreur lors de l\'enregistrement de la vente');
    }

    // Récupérer les données de la vente créée
    const venteData = await venteResponse.json();
    venteId.value = venteData.vente.id;
    venteMontant.value = venteData.vente.montant_total

    console.log(venteId.value, "vente ID");
    

    // Parcourir les articles du panier et les enregistrer dans la table "ligne_article"
    for (const product of props.articlePanier) {
      const ligneArticleResponse = await fetch('http://localhost:8000/api/lignearticles', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          vente_id: venteId.value,
          produit_id: product.id,
          quantite: product.quantite,
        }),
      });

      console.log(ligneArticleResponse, "Ligne Article Store");

      // Vérifier la réponse de la requête
      if (!ligneArticleResponse.ok) {
        throw new Error('Erreur lors de l\'enregistrement de la ligne d\'article');
      }
    }

    await enregistrerPaiement(venteId.value);


    } catch (error) {
        console.error('Une erreur s\'est produite lors de l\'enregistrement de la vente et du paiement :', error);
    }
    
    opene.value = true
} 

// Méthode pour sélectionner un moyen de paiement
const selectPaymentMethod = (moyen) => {
  selectedPaymentMethod.value = moyen;
};

const enregistrerPaiement = async () => {

    // Vérifier si un moyen de paiement a été sélectionné
    if (!selectedPaymentMethod.value) {
        console.error("Veuillez sélectionner un moyen de paiement.");
        return;
    }

    // Récupérer les données du panier
    const produits = [...props.articlePanier];
    const totalPanier = total.value;
    const selectedPayment = selectedPaymentMethod.value.title;
    


try {
    console.log(venteId.value, "Paiement vente ID 1111111111111");
    const paiementResponse = await fetch('http://localhost:8000/api/paiements', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      moyen_paiement: selectedPayment,
      montant: totalPanier,
      vente_id: venteId.value,
    }),
  });

  const paiementData = await paiementResponse.json();
    const paiementMontant = paiementData.montant;

    console.log(paiementMontant, "Montant du Paiement")

  if (!paiementResponse.ok) {
      throw new Error('Erreur lors de l\'enregistrement du paiement');
    }

    // if (selectedPayment === 'Cash' && totalPanier <= paiementMontant) {
    //   // Imprimer le ticket de caisse
    // //   imprimerTicket();
    // }

    if (paiementMontant >= venteMontant.value) {
    // Imprimer le ticket de caisse
    // imprimerTicket();
    console.log("Tu peux imprimer le ticket");
  }

    
} catch (error) {
    console.error('Une erreur s\'est produite lors de l\'enregistrement de la vente et du paiement :', error);
}
    // Réinitialiser le panier et fermer le modal
    props.articlePanier.splice(0);
    total.value = 0;
    // opene.value = false;
}

const imprimerTicket = () => {
    openTicket.value = true;
}


onMounted(calculerTotal);
watch(props.articlePanier, calculerTotal);

</script>