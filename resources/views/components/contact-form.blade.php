<form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block mb-1 font-medium">Nom</label>
        <input id="name" type="text" name="name" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <div>
        <label for="email" class="block mb-1 font-medium">Email</label>
        <input id="email" type="email" name="email" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <div>
        <label for="message" class="block mb-1 font-medium">Message</label>
        <textarea id="message" name="message" rows="5" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
    </div>
    <div class="pt-3 text-center">
        <button type="submit"
                class="bg-blue-900 hover:bg-white hover:text-blue-900 text-white font-semibold py-2 px-10 sm:px-20 lg:px-40 rounded-lg shadow-md border border-transparent hover:border-blue-900 transition duration-300">
            Envoyer
        </button>
    </div>
</form>

