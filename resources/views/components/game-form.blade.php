@props(['action', 'method', 'game' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Game Name Field -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $game->name ?? '') }}" required
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        @error('name')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Game Image Field -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @isset($game->image)
            <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}" class="w-32 h-32 mt-2">
        @endisset
        @error('image')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Game Genre Field -->
    <div class="mb-4">
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input type="text" name="genre" id="genre" value="{{ old('genre', $game->genre ?? '') }}" required
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        @error('genre')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Game Description Field -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" required
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">{{ old('description', $game->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
        <textarea name="tags" id="tags" rows="4" required
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">{{ old('tags', $game->tags ?? '') }}</textarea>
        @error('tags')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>



    <!-- Submit Button -->
    <div>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
            {{ isset($game) ? 'Update Game' : 'Publish Game' }}
        </button>
    </div>
</form>
