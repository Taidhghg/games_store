<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class GameController extends Controller
{

    public function index()
    {
        $games = Game::all();
        return view("games.index", compact("games"));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255', 
            'genre' => 'required|string|max:500', 
            'tags' => 'required|string', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'developer' => 'required|string|max:255',
        ]);
    
       
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension(); 
            $request->image->storeAs('public/images/games', $imageName); 
        }
    

        Game::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'tags' => $request->tags, 
            'developer' => $request->developer, 
            'images' => $imageName, 
            'description' => $request->description, 
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
    
    
        return to_route('games.index')->with('success', 'Game created successfully!');
    }
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }


    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
    
        $game = Game::findOrFail($id);
        $game->title = $validatedData['title'];
        $game->genre = $validatedData['genre'];
        $game->description = $validatedData['description'];
        $game->tags = $validatedData['tags'] ?? '';
    
        if ($request->hasFile('image')) {

            if ($game->image) {
                Storage::delete('public/images/games/' . $game->image);
            }
    
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/games/', $imageName); 
            $game->image = $imageName;
        }
    
        $game->save();
    
        return redirect()->route('games.show', $game->id)->with('success', 'Game updated successfully!');
    }

public function destroy(Game $game)
{
    try {
        $game->delete();

        if ($game->image) {
            Storage::delete('images/games/' . $game->image);
        }
        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('games.index')->with('error', 'Failed to delete the game.');
    }
}
}