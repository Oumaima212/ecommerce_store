<div id="products-section">
    <section class="py-10 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-center mb-6">
                <div class="flex-grow h-px bg-gray-300"></div>
                <h2 class="text-2xl font-bold px-4 text-center whitespace-nowrap">Nos Produits</h2>
                <div class="flex-grow h-px bg-gray-300"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-20">
                @foreach($products as $product)
                    <a href="{{ route('product.show', $product->id) }}"
                       class="block bg-white shadow-md rounded-xl overflow-hidden hover:shadow-xl transition relative">
                        <div class="relative w-full h-48 overflow-hidden border rounded-lg">
                            {{-- Image principale --}}
                            <img
                                src="{{ asset($product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover
                                    transition-opacity duration-300
                                    {{ $product->images->skip(1)->first() ? 'hover:opacity-0' : '' }}"
                            >

                            {{-- Afficher la 2e image seulement si elle existe --}}
                            @if($secondImage = $product->images->skip(1)->first())
                                <img
                                    src="{{ asset($secondImage->image_path) }}"
                                    alt="{{ $product->name }}"
                                    class="absolute top-0 left-0 w-full h-full object-cover
                                        transition-opacity duration-300 opacity-0 hover:opacity-100"
                                >
                            @endif
                        </div>

                        <div class="p-4">
                                @if(isset($product->old_price) && $product->old_price > $product->price)
                                    <p class="text-gray-500 line-through text-sm ">{{ $product->old_price }} Dhs</p>
                                @endif
                                <p class="text-blue-900 font-bold mt-2">{{ $product->price }} Dhs</p>

                                <h3 class="font-semibold text-lg">{{ $product->name }}</h3>

                                {{-- Affichage du bouton stock --}}
                                @if($product->stock > 0)
                                    {{-- <span class="absolute top-2 left-2 bg-green-600 text-white text-xs font-semibold px-2 py-1 rounded shadow">
                                        In Stock
                                    </span>--}}
                                 @else
                                    <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded shadow">
                                        Out of Stock
                                    </span>
                                @endif

                                {{-- Affichage des variations --}}
                                @if($product->variations)
                                    @php $variations = $product->variations; @endphp

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

            {{-- Pagination --}}
            @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </section>
</div>
