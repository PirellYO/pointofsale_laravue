import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ListePaiementView from '../views/ListePaiementView.vue'
import ListeVentesView from '../views/ListeVentesView.vue'
// import ReceiptView from '../views/ReceiptView.vue'
// import ListeProduits from '../components/ListeProduits.vue'
// import PanierProduits from '../components/PanierProduits.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/ventes',
      name: 'Vente',
      component: ListeVentesView

    },
    { 
      path: '/paiements',
      name: 'Paiement',
      component: ListePaiementView
    },
    // { 
    //   path: '/receipt',
    //   name:'Reçu',
    //   // component: () => import('../components/ReceiptView.com')
    //   component: ReceiptView 
    // },
  ]
})

export default router
