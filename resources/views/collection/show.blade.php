@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-4">{{ $collection->name }}</h1>
    <img src="{{ asset($collection->image) }}"  alt="{{ $collection->name }}" class="w-full h-64 object-cover rounded mb-9">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
        @foreach ($collection->products as $product)
                    <a href="{{ route('product.show', $product->id) }}"
                       class="block bg-white shadow-md rounded-xl overflow-hidden hover:shadow-xl transition relative">
                        <div class="relative w-full h-48 overflow-hidden border rounded-lg">
                            {{-- img principale --}}
                            <img
                                src="{{ asset($product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover
                                    transition-opacity duration-300
                                    {{ $product->images->skip(1)->first() ? 'hover:opacity-0' : '' }}"
                            >

                            {{-- Afficher la 2eme img  --}}
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

                                {{-- Stock btn --}}
                                @if($product->stock > 0)
                                    {{-- <span class="absolute top-2 left-2 bg-green-600 text-white text-xs font-semibold px-2 py-1 rounded shadow">
                                        In Stock
                                    </span>--}}
                                @else
                                    <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded shadow">
                                        Out of Stock
                                    </span>
                                @endif

                                {{-- Variations/colors, size --}}
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
</div>
@endsection
