<x-tag-form :action="route('tags.store')" :method="'POST'" />
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Tag Name Input -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Tag Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $tag->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <!-- Submit Button -->
    <div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
        </button>
    </div>
</form>