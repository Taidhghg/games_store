<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
                {{ __('All games') }}
            </h2>
        </x-slot>
 
        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">Game Details</h3>
                            <x-game-details
                                :title="$game->title"
                                :genre="$game->genre"
                                :developer="$game->developer"
                                :tags="$game->tags"
                                :image="$game->images"
                                :description="$game->description"
                            />
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>