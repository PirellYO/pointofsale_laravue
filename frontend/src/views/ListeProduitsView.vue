<script setup>
  import { ref } from 'vue'
  
  const products = ref([])
  
  // fetch('http://localhost:8000/api/produits')
  //   .then(response => response.json())
  //   .then(data => products.value = data)

  // const products = ref([]);

    // fonction pour récupérer la liste des produits depuis le backend
    async function fetchProducts() {
      const response = await fetch('http://localhost:8000/api/produits');
      products.value = await response.json();
    }

    // appel de la fonction au chargement du composant
    fetchProducts();
</script>

<template>
    <div>
      <h2>Liste des produits</h2>
      <table>
        <thead>
          <tr>
            <th>Référence</th>
            <th>Désignation</th>
            <th>Prix</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(product, index) in products" :key="index">
            <td>{{ product.reference }}</td>
            <td>{{ product.designation }}</td>
            <td>{{ product.prix }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  