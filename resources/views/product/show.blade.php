@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4" x-data="productComponent()">
    <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-1/2">
            <!-- img principale -->
            <img :src="mainImage" alt="{{ $product->name }}" class="w-full object-cover rounded mb-4" x-ref="mainImage">

            <!-- imgs secondaires -->
            @if($product->images && $product->images->count())
                <div class="flex flex-wrap gap-2">
                    @foreach($product->images as $img)
                        <img src="{{ asset($img->image_path) }}" alt="Image secondaire"
                             class="w-20 h-20 object-cover border rounded cursor-pointer hover:scale-105 transition"
                             @click="mainImage = '{{ asset($img->image_path) }}'">
                    @endforeach
                </div>
            @endif
        </div>

        <div class="md:w-1/2 flex flex-col">
            <!-- Fil d’Ariane -->
            <nav class="text-sm text-gray-500 mb-4">
                <ol class="list-reset flex">
                    <li>
                        <a href="{{ url('/') }}" class="text-blue-900 hover:text-blue-600 hover:text-base">Home</a>
                    </li>
                    <li><span class="mx-2">/</span></li>
                    <li>
                        <a href="{{ url('/collections') }}" class="text-blue-900 hover:text-blue-600 hover:text-base">Collection</a>
                    </li>
                    <li><span class="mx-2">/</span></li>
                    <li>
                        <a href="{{ optional($product)->slug }}" class="text-blue-900 hover:text-blue-600 hover:text-base">
                            <h1>{{ optional($product)->name }}</h1>
                        </a>
                    </li>
                </ol>
            </nav>

            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>

            {{-- Short Description --}}
            @if(!empty($product->short_description))
                <p class="mb-4 text-gray-700 font-semibold">{{ $product->short_description }}</p>
            @endif


            {{-- Prix --}}
            <p class="text-blue-900 font-bold text-xl mb-6">{{ $product->price }} Dhs</p>

            {{-- Variations --}}
            @if($product->variations)
                    @php
                        $variations = $product->variations;
                    @endphp

                    {{-- Couleurs --}}
                    @if(!empty($variations['color']))
                        <p class="text-sm text-gray-700 mb-2">Couleurs :<br>
                            @foreach($variations['color'] as $color)
                                <span class="inline-block w-5 h-5 mt-3 rounded-full mx-1 border" style="background-color: {{ $color }}"></span>
                            @endforeach
                        </p>
                    @endif

                    {{-- Tailles --}}
                    @if(!empty($variations['size']))
                        <p class="text-sm text-gray-700 mb-4">Tailles :<br>
                            @foreach($variations['size'] as $size)
                                <span class="inline-block border px-2 py-0.5 mx-1 text-xs mt-3">{{ $size }}</span>
                            @endforeach
                        </p>
                    @endif
            @endif
            <!-- Quantité + Ajouter au panier -->
            <div class="flex items-center gap-4 mb-4">
                <div class="flex items-center border rounded overflow-hidden">
                    <button type="button" @click="decreaseQty()" class="px-3 py-1 bg-gray-200">-</button>
                    <input type="number" x-model="quantity" min="1" class="w-12 text-center border-x">
                    <button type="button" @click="increaseQty()" class="px-3 py-1 bg-gray-200">+</button>
                </div>

                <a href="#" class="bg-black text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Ajouter au panier
                </a>
            </div>

            <!-- Acheter maintenant -->
            <a href="{{ route('checkout') }}" class="bg-blue-900 text-white px-20 py-2 rounded hover:bg-black transition w-fit">
                Acheter maintenant
            </a>

             {{-- Long Description --}}
            @if(!empty($product->long_description))
                <p class="mb-6 mt-5 text-gray-600 leading-relaxed"><span class="mb-3 text-gray-700 font-semibold">Description:</span> <br>{{ $product->long_description }}</p>
            @endif



        </div>


    </div>
            <!-- Bloc infos 5 Luxhub -->
            <div class="mt-3 space-y-3 text-sm text-gray-700 leading-relaxed border-t pt-4 bg-gray-100 p-4 rounded-lg">
                <div>
                    <p class="font-semibold">🚚 Livraison gratuite</p>
                    <p>Sur toutes les commandes de plus de 499 MAD.</p>
                </div>

                <div class="pt-2 border-t">
                    <p class="font-semibold">↩️ Retours simplifiés</p>
                    <p>Retour possible sous 3 jours après réception.</p>
                </div>

                <div class="pt-2 border-t">
                    <p class="font-semibold">🏷️ Marque</p>
                    <p>Produit 100% original <span class="text-gray-700 font-semibold">Luxhub</span> , spécialiste du style masculin moderne.</p>
                </div>

                <div class="pt-2 border-t">
                    <p class="text-xs text-gray-500">
                        Besoin d’aide ? Contactez notre service client à
                        <a href="mailto:contact@5luxhub.com" class="text-blue-600 underline">contact@luxhub.com</a>
                    </p>
                </div>
            </div>
            @if($similarProducts->count())
                <div class="max-w-6xl mx-auto mt-4 px-4">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Produits similaires</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach($similarProducts as $simProduct)
                            <a href="{{ route('product.show', $simProduct->id) }}" class="block bg-white shadow-md rounded-xl overflow-hidden hover:shadow-xl transition relative">

                                <img src="{{ asset($simProduct->image) }}" alt="{{ $simProduct->name }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        @if(isset($simProduct->old_price) && $simProduct->old_price > $simProduct->price)
                                                <p class="text-gray-500 line-through text-sm ">{{ $simProduct->old_price }} Dhs</p>
                                        @endif
                                            <p class="text-blue-900 font-bold mt-2">{{ $simProduct->price }} Dhs</p>

                                            <h3 class="font-semibold text-lg">{{ $simProduct->name }}</h3>

                                            {{-- Affichage du bouton stock --}}
                                        @if($simProduct->stock > 0)
                                                {{-- <span class="absolute top-2 left-2 bg-green-600 text-white text-xs font-semibold px-2 py-1 rounded shadow">
                                                    In Stock
                                                </span>--}}
                                            @else
                                                <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded shadow">
                                                    Out of Stock
                                                </span>
                                        @endif

                                            {{-- Affichage des variations --}}
                                        @if($simProduct->variations)
                                                @php $variations = $simProduct->variations; @endphp

                                                @if(!empty($variations['color']))
                                                    <p class="text-sm text-gray-700 mt-2">
                                                        @foreach($variations['color'] as $color)
                                                            <span class="inline-block w-4 h-4 rounded-full mx-1 border"
                                                                style="background-color: {{ $color }}"></span>
                                                        @endforeach
                                                    </p>
                                                @endif

                                                @if(!empty($variations['size']))
                                                            <p class="text-sm text-gray-700 mt-0">
                                                                @foreach($variations['size'] as $size)
                                                                    <span class="inline-block border px-2 py-0.5 mx-1 text-xs">{{ $size }}</span>
                                                                @endforeach
                                                            </p>
                                                @endif
                                        @endif
                                    </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
</div>

<!-- Alpine.js -->
<script>
    function productComponent() {
        return {
            quantity: 1,
            mainImage: '{{ asset($product->image) }}',
            increaseQty() {
                this.quantity++;
            },
            decreaseQty() {
                if (this.quantity > 1) this.quantity--;
            }
        };
    }
</script>


@endsection
