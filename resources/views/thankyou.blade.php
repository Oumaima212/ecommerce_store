@extends('layouts.app')

@section('content')
    <div class="relative w-full h-[500px] mb-3 ">
        <img src="{{ asset('images/thankyou.jpg') }}" alt="Merci" class="absolute inset-0 w-full h-full object-cover z-0 ">

        <div class="relative z-10 pt-40 flex flex-col items-center justify-center h-full text-center text-white bg-black/15">
            <h1 class="text-4xl text-blue-900 font-bold mb-4">Merci pour votre commande !</h1>
            <p class="text-black mb-6">
                    Nous avons bien reçu votre commande. <br>
                    Nous vous contacterons bientôt pour la livraison.
            </p>
            <a href="{{ route('products.index') }}"
            class="inline-block hover:bg-white bg-blue-900 hover:text-blue-900 font-medium py-2 px-6 rounded transition">
                Continuer mes achats
            </a>
        </div>
    </div>
@endsection
