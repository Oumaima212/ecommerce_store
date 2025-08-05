<div x-data="{ mobileMenu: false, cartOpen: false, searchOpen: false }">
    <!-- header 1 -->
    <div class="bg-blue-900 h-8 flex flex-wrap items-center justify-between px-4 text-xs text-white relative">
            <!-- Num -->
            <div class="text-sm flex-shrink-0">
                |
                @foreach(str_split('+212744047448') as $index => $char)
                    <span class="animate-rise" style="animation-delay: {{ $index * 0.05 }}s">
                        {{ $char === ' ' ? '' : $char }}
                    </span>
                @endforeach
            </div>
            <!-- Texte centre -->
            <p class="absolute left-1/2 transform -translate-x-1/2 text-sm text-center hidden sm:block">
                        Produits de qualité, livraison rapide et service client à votre écoute
            </p>
            <!-- Réseaux sociaux -->
            <div class="flex items-center space-x-1">
                <a href="#"><img src="{{ asset('images/facebook.png') }}" class="h-9 w-9" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('images/instagram.png') }}" class="h-7 w-9" alt="Instagram"></a>
                <a href="#"><img src="{{ asset('images/tiktok.png') }}" class="h-6 w-6 ml-1" alt="Tiktok"></a>            </div>
            </div>

            <nav class="bg-white shadow p-4 flex justify-between items-center">
                    <!-- Logo -->
                    <div class="flex items-center space-x-8">
                        <img class="w-24 h-auto" src="{{ asset('images/logo.png') }}"  alt="logo" />

                        <!-- Navigation links -->
                        <ul class="hidden md:flex space-x-6">
                            <li><a href="/" class="hover:text-blue-600">Accueil</a></li>
                            <li><a href="/products" class="hover:text-blue-600">Produits</a></li>
                            <li><a href="/collections" class="hover:text-blue-600">Collections</a></li>
                            <li><a href="/contact" class="hover:text-blue-600">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Panier & recherche -->
                    <div class="flex items-center space-x-4" x-data="{ cartOpen: false, searchOpen: false }">
                        <!-- Icônes -->
                        <div class="flex items-center space-x-4">
                            <!-- Recherche -->
                            <div class="relative">
                                <button @click="searchOpen = !searchOpen" class="text-gray-400 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0a7 7 0 11-9.9-9.9 7 7 0 019.9 9.9z" />
                                    </svg>
                                </button>

                                <div x-show="searchOpen" @click.away="searchOpen = false"
                                    class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded p-2 z-50">
                                    <input type="text" placeholder="Recherche..."
                                        class="w-full border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                </div>
                            </div>

                            <!-- Panier -->
                            <div class="relative">
                                <button @click="cartOpen = !cartOpen" class="text-gray-600 hover:text-blue-600 relative">
                                    🛒
                                    <span class="bg-red-600 text-white text-xs rounded-full px-1 absolute -top-2 -right-2">0</span>
                                </button>

                                <div x-show="cartOpen" @click.away="cartOpen = false"
                                    class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded p-4 z-50">
                                    <p>Ton panier est vide.</p>
                                </div>
                            </div>

                            <!-- btn menu mobile -->
                            <button @click="mobileMenu = !mobileMenu" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
            </nav>

            <!-- Menu Mobile -->
            <div x-show="mobileMenu" class="md:hidden space-y-2 bg-white shadow p-4">
                <a href="/" class="block text-sm text-gray-700 hover:text-blue-600">Accueil</a>
                <a href="/products" class="block text-sm text-gray-700 hover:text-blue-600">Produits</a>
                <a href="/collections" class="block text-sm text-gray-700 hover:text-blue-600">Collections</a>
                <a href="/contact" class="block text-sm text-gray-700 hover:text-blue-600">Contact</a>
            </div>
    </div>
</div>
