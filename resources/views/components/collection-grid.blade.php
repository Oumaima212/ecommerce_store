@php
    $collections = $collections ?? \App\Models\Collection::all();
@endphp

<div>
    <section class="py-10 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-center mb-6">
                <div class="flex-grow h-px bg-gray-300"></div>
                <h2 class="text-2xl font-bold px-4 text-center whitespace-nowrap">Nos Collections</h2>
                <div class="flex-grow h-px bg-gray-300"></div>
            </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-20">
            @foreach($collections as $collection)
                <a href="{{ route('collections.show', $collection->slug) }}" class="block rounded overflow-hidden shadow-lg hover:shadow-xl transition">
                    <img src="{{ $collection->image }}" alt="{{ $collection->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $collection->name }}</h3>
                        <p class="text-gray-600 text-sm">
                            {{ $collection->products->count() }} produit{{ $collection->products->count() > 1 ? 's' : '' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</div>
