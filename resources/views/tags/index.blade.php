<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">All Tags</h3>
                    <ul class="list-disc pl-5">
                        @foreach($tags as $tag)
                            <li class="flex justify-between items-center mb-2">
                   
                                <div>
                                    <a href="{{ route('tags.show', $tag->id) }}" class="text-blue-500 hover:underline">
                                        {{ $tag->name }}
                                    </a>
                                </div>
                                    <div class="flex space-x-2">
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                        Edit
                                    </a>

                  
                                    <form method="POST" action="{{ route('tags.destroy', $tag->id) }}" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>