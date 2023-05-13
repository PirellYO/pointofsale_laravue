import { createStore } from "vuex";

const store = createStore({
    state:{
        panier: [],
    },
    mutations: {
        ajoutProduitPanier(state, produit) {
            state.panier.push(produit)
        },
    },
})

export default store