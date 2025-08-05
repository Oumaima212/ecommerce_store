<div>
<div class="fixed top-0 right-0 w-80 h-full bg-white shadow-lg p-4 z-50"
     x-show="openCart"
     x-data="{ openCart: false }"
     x-cloak
     @cart-open.window="openCart = true"
     @cart-close.window="openCart = false"
     @click.away="openCart = false">

    <h2 class="text-xl font-bold mb-4">Ton Panier</h2>
    <p>Le panier est vide pour le moment.</p>
    <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded" @click="openCart = false">Fermer</button>
</div>
</div>
