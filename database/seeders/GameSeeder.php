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
            ['name' => 'SILENT HILL 2', 'genre' => 'Horror', 'developer' => 'Bloober Team SA', 'tags' => '3D, Survival Horror, Psychological Horror', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            ['name' => 'Dead by Daylight', 'genre' => 'Survival Horror', 'developer' => 'Behaviour Interactive Inc.', 'tags' => 'Co-op, Multiplayer, VR', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            ['name' => 'Elden ring', 'genre' => 'RPG', 'developer' => 'FromSoftware, Inc.', 'tags' => 'Action, Difficult, Fantasy', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            ['name' => 'Cyberpunk 2077', 'genre' => 'Open world', 'developer' => 'CD PROJEKT RED', 'tags' => 'Cyberpunk, Open world, Sci-fi', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp],
            ['name' => 'Red Dead Redemption 2', 'genre' => 'Open world', 'developer' => 'Rockstar games', 'tags' => 'Story rich, Western, Adventure', 'created_at' => $currentTimestamp,'updated_at'=> $currentTimestamp]]
            
            
        );
    }
}
