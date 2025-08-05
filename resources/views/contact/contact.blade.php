@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 mt-4 rounded max-w-2xl mx-auto">
        {{ session('success') }}
    </div>
@endif
    <!-- Version mobile/tablette -->
<div class="block lg:hidden">
    <div class="max-w-6xl mx-auto py-10 px-4 flex flex-col lg:flex-row gap-10">

        <!-- imgs gauche -->
        <div class="w-full lg:w-1/2 flex flex-wrap justify-center gap-4">
            <img src="https://i.pinimg.com/1200x/7f/95/6f/7f956f373a6f8f1f2dc73c61f89baa57.jpg" alt="Part 1" class="w-28 sm:w-32 md:w-36 lg:w-40 h-64 object-cover rounded">
            <img src="https://i.pinimg.com/736x/0e/6a/1d/0e6a1de62648301226782995197051ed.jpg" alt="Part 2" class="w-28 sm:w-32 md:w-36 lg:w-40 h-64 object-cover rounded">
            <img src="https://i.pinimg.com/736x/da/18/49/da1849668b6c55c93e233b7646ca0edc.jpg" alt="Part 3" class="w-28 sm:w-32 md:w-36 lg:w-40 h-64 object-cover rounded">
        </div>
        <!-- form droite -->
            <div class="w-full">
                <h1 class="text-3xl font-bold mb-6 text-center">Contactez-nous</h1>
                @include('components.contact-form')
            </div>
    </div>
</div>

<!-- Version PC (desktop) -->
<div class="hidden lg:block">
    <div class="max-w-6xl mx-auto py-10 px-4 flex flex-col md:flex-row gap-10">
        <!-- Colonne gauche : formulaire -->
        <div class="w-full md:w-1/2 flex items-center justify-center">
            <img src="https://i.pinimg.com/1200x/7f/95/6f/7f956f373a6f8f1f2dc73c61f89baa57.jpg" alt="Part 1" class="w-34 h-[500px] object-cover ml-4">
            <img src="https://i.pinimg.com/736x/0e/6a/1d/0e6a1de62648301226782995197051ed.jpg" alt="Part 2" class="w-32 h-[500px] object-cover ml-4">
            <img src="https://i.pinimg.com/736x/da/18/49/da1849668b6c55c93e233b7646ca0edc.jpg" alt="Part 3" class="w-32 h-[500px] object-cover ml-4">
        </div>
        <!-- form droite -->
            <div class="w-1/2">
                <h1 class="text-3xl font-bold mb-6 text-center">Contactez-nous</h1>
                @include('components.contact-form')
            </div>
            </div>
    </div>
</div>



@endsection
