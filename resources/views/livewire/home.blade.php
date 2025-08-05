@extends('layouts.app')

@section('content')
        <div class="relative h-64 sm:h-80 md:h-[400px] lg:h-[500px] overflow-hidden"
            x-data="{
                slides: [
                    { image: '{{ asset('images/slider1.jpeg') }}', title: 'Découvrez notre nouvelle collection' },
                    { image: '{{ asset('images/slider2.jpeg') }}', title: 'Styles tendance pour chaque saison' },
                    { image: '{{ asset('images/slider3.jpeg') }}', title: 'Livraison rapide partout au Maroc' }
                ],
                activeSlide: 0,
                next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
            }"
            x-init="setInterval(() => next(), 3000)"
        >

            <!-- Slides -->
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index"
                    class="absolute inset-0 bg-cover bg-center transition-all duration-500"
                    :style="`background-image: url(${slide.image})`">
                    <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
                        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl text-white font-bold text-center px-4" x-text="slide.title"></h2>
                    </div>
                </div>
            </template>

            <!-- Buttons -->
            <button @click="prev" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white mx-0 rounded-full shadow">
                ‹
            </button>
            <button @click="next" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white mx-0 rounded-full shadow">
                ›
            </button>

        </div>


@include('components.collection-grid')


    <section class="py-10 px-4 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">À propos de Luxhub</h2>
            <p class="text-gray-700 leading-relaxed">
                Luxhub est une marque marocaine de vêtements pour hommes, alliant élégance, confort et modernité.
                Chaque pièce est pensée pour refléter le style et la personnalité de l'homme d'aujourd'hui.
            </p>
        </div>
    </section>

        <div class="text-center my-10">
            <a href="/products" class="inline-block bg-blue-900 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-white hover:text-blue-900 transition">
                Découvrir tous nos produits
            </a>
        </div>

@livewire('product-list')

@endsection
