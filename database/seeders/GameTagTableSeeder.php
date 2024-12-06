<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Tag;
class GameTagTableSeeder extends Seeder
{
   public function run()
   {
       // Define the specific game-to-tag associations
       $gameTagAssignments = [
           'Silent Hill 2' => ['Horror', 'Story-Driven', 'Survival'],
           'Dead by Daylight' => ['Horror', 'Multiplayer', 'Survival'],
           'Elden Ring' => ['RPG', 'Fantasy', 'Open World', 'Action'],
           'Cyberpunk 2077' => ['RPG', 'Open World', 'Story-Driven', 'Action'],
           'Red Dead Redemption 2' => ['Open World', 'Story-Driven', 'Adventure'],
       ];
       foreach ($gameTagAssignments as $gameTitle => $tags) {
           // Retrieve the game by title
           $game = Game::where('title', $gameTitle)->first();
           if ($game) {
               // Retrieve tag IDs for the given tag names
               $tagIds = Tag::whereIn('name', $tags)->pluck('id')->toArray();
               // Verify $tagIds is an array and not empty
               if (!empty($tagIds)) {
                   // Attach tags to the game using the pivot table
                   $game->tags()->sync($tagIds);
               } else {
                   echo "No tags found for game: $gameTitle\n";
               }
           } else {
               echo "Game not found: $gameTitle\n";
           }
       }
   }
}