@props(['title', 'genre', 'developer', 'tags', 'image', 'description'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <!-- Game Title -->
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">
        {{ $title }}
    </h1>

    <!-- Game Cover Image -->
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/games/' . $image) }}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover">
    </div>

    <!-- Genre -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">
        Genre: {{ $genre }}
    </h2>

    <!-- Developer -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">
        Developer: {{ $developer }}
    </h2>

    <!-- Tags -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">
        Tags: {{ $tags }}
    </h2>

    <!-- Game Description -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">
        Description
    </h3>
    <p class="text-gray-700 leading-relaxed">{{ $description }}</p>
</div>