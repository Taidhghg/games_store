@props(['title', 'image', 'genre'])

<div class="border border-gray-200 rounded-lg shadow-lg overflow-hidden bg-white hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">
    <img 
        src="{{ asset('images/games/' . $image) }}" 
        alt="{{ $title }}" 
        class="w-full h-64 object-cover rounded-t-lg"
    >
    <div class="p-6">
        <h4 class="font-semibold text-2xl text-gray-800 hover:text-indigo-600 transition duration-200">{{ $title }}</h4>
        <p class="text-sm text-gray-500 mt-2">Genre: <span class="font-medium text-indigo-600">{{ $genre }}</span></p>
    </div>
</div>