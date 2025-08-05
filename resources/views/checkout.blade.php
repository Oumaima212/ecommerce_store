@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-10">

        <div class="flex items-center justify-center mb-8 space-x-4">
            <!-- Panier -->
            <div class="flex items-center space-x-2 text-blue-600">
                <div class="w-9 h-9 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold">1</div>
                <span class="font-medium">Panier</span>
            </div>
            <div class="w-8 h-1 bg-blue-300"></div>
            <!-- Informations -->
            <div class="flex items-center space-x-2 text-blue-600">
                <div class="w-9 h-9 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold">2</div>
                <span class="font-medium">Informations</span>
            </div>
            <div class="w-8 h-1 bg-blue-300"></div>
            <!-- Terminé -->
            <div class="flex items-center space-x-2 text-gray-400">
                <div class="w-9 h-9 rounded-full bg-gray-300 text-white flex items-center justify-center font-bold">3</div>
                <span class="font-medium">Commande terminée</span>
            </div>
        </div>


        <div class="grid md:grid-cols-2 gap-10">

            <!-- Résumé de la commande -->
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">🧾 Résumé de la commande</h2>
                <div class="flex justify-between mb-2">
                    <div>
                        <p class="font-medium">Nom du produit</p>
                        <p class="text-sm text-gray-500">Qté : 1</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-gray-300">xxx</p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="flex justify-between text-gray-600 mb-1">
                    <p>Sous-total</p>
                    <p>0 Dhs</p>
                </div>
                <div class="flex justify-between font-bold text-lg">
                    <p>Total</p>
                    <p>0 Dhs</p>
                </div>
            </div>

            <!-- form de commande -->
            <form class="space-y-6 bg-white p-6 rounded-lg shadow" method="POST">
                @csrf
                <h2 class="text-xl font-semibold">📦 Informations de contact</h2>
                <div>
                    <label class="block mb-1 font-medium">Numéro de téléphone *</label>
                    <div class="flex gap-2">
                        <span class="bg-gray-100 px-4 py-2 rounded border">+212</span>
                        <input type="tel" name="phone" required class="w-full border px-4 py-2 rounded focus:outline-none" placeholder="0650-123456">
                    </div>
                </div>
                <h2 class="text-xl font-semibold pt-6">🚚 Adresse de livraison</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1">Prénom *</label>
                        <input type="text" name="first_name" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div>
                        <label class="block mb-1">Nom *</label>
                        <input type="text" name="last_name" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-1">Adresse *</label>
                        <input type="text" name="address" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-1">Appartement (optionnel)</label>
                        <input type="text" name="appartement" class="w-full border px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1">Code postal (optionnel)</label>
                        <input type="text" name="postal_code" class="w-full border px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1">Ville *</label>
                        <select name="city" class="w-full border px-3 py-2 rounded" required>
                            <option value="">Choisir une ville</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Tanger">Tanger</option>
                            <option value="Fès">Fès</option>
                            <option value="Meknès">Meknès</option>
                            <option value="Oujda">Oujda</option>
                            <option value="Essaouira">Essaouira</option>
                            <option value="Tétouan">Tétouan</option>
                            <option value="Safi">Safi</option>
                            <option value="Kénitra">Kénitra</option>
                            <option value="Beni Mellal">Beni Mellal</option>
                            <option value="Laayoune">Laayoune</option>
                            <option value="Dakhla">Dakhla</option>
                            <option value="El Jadida">El Jadida</option>
                        </select>
                    </div>
                </div>
                <div class="pt-4">
                    <h2 class="text-xl font-semibold mb-2">🚛 Mode de livraison</h2>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="shipping" value="domicile" checked>
                        <span>Livraison à votre maison</span>
                    </label>
                </div>
                <div class="pt-4">
                    <h2 class="text-xl font-semibold mb-2">💳 Mode de paiement</h2>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment" value="cash" checked>
                        <span>Paiement à la livraison</span>
                    </label>
                </div>
                <div class="pt-6">
                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded hover:bg-green-700 transition">
                        Commander maintenant
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
