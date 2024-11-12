<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Game::insert([
            ['title' => 'SILENT HILL 2', 'genre' => 'Horror', 'developer' => 'Bloober Team SA', 'tags' => '3D, Survival Horror, Psychological Horror', 'description' => 'Investigating a letter from his late wife, James returns to where they made so many memories - Silent Hill. What he finds is a ghost town, prowled by disturbing monsters and cloaked in deep fog. Confront the monsters, solve puzzles, and search for traces of your wife in this remake of SILENT HILL 2.' , 'images' => 'silenthill2.jpg', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            
            ['title' => 'Dead by Daylight', 'genre' => 'Survival Horror', 'developer' => 'Behaviour Interactive Inc.', 'tags' => 'Co-op, Multiplayer, VR', 'description' => 'Dead by Daylight is a multiplayer (4vs1) horror game where one player takes on the role of the savage Killer, and the other four players play as Survivors, trying to escape the Killer and avoid being caught and killed.' , 'images' => 'deadbydaylight.jpg', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            
            ['title' => 'Elden ring', 'genre' => 'RPG', 'developer' => 'FromSoftware, Inc.', 'tags' => 'Action, Difficult, Fantasy' , 'description' => 'THE CRITICALLY ACCLAIMED FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.' , 'images' => 'eldenring.jpg', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            
            ['title' => 'Cyberpunk 2077', 'genre' => 'Open world', 'developer' => 'CD PROJEKT RED', 'tags' => 'Cyberpunk, Open world, Sci-fi', 'description' => 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the dark future of Night City — a dangerous megalopolis obsessed with power, glamor, and ceaseless body modification.' , 'images' => 'cyberpunk.jpg', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            
            ['title' => 'Red Dead Redemption 2', 'genre' => 'Open world', 'developer' => 'Rockstar games', 'tags' => 'Story rich, Western, Adventure', 'description' => 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, RDR2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age. Also includes access to the shared living world of Red Dead Online.', 'images' => 'reddead.jpg', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp]]
            
            
        );
    }
}
