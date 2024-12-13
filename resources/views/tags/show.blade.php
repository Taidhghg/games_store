<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Games with Tag: ') }} {{ $tag->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Games Related to "{{ $tag->name }}"</h3>
                    @if($games->isEmpty())
                        <p class="text-gray-600">No games are associated with this tag.</p>
                    @else
                        <ul class="list-disc pl-5">
                            @foreach($games as $game)
                                <li>
                                    <a href="{{ route('games.show', $game->id) }}" class="text-blue-500 hover:underline">
                                        {{ $game->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>