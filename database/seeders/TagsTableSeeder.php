<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TagsTableSeeder extends Seeder
{
   public function run()
   {
       $tags = [
           'Horror', 'Action', 'Adventure', 'Multiplayer',
           'Open World', 'RPG', 'Survival', 'Fantasy', 'Story-Driven'
       ];
       foreach ($tags as $tag) {
           DB::table('tags')->insert([
               'name' => $tag,
               'created_at' => now(),
               'updated_at' => now(),
           ]);
       }
   }
}