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
            'name' => 'required',
            'genre' => 'required|max:500',
            'tags' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/games/'), $imageName);
        }


        Game::create([
            'name' => $request->name,
            'genre' => $request->genre,
            'developer' => $request->developer,
            'image' => $imageName, 
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


    public function update(Request $request, Game $game)
    {

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'genre' => 'nullable|string|max:255',
        'developer' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    \Log::info('Update request data:', $request->all());


    if ($request->hasFile('image')) {

        if ($game->image) {
            Storage::delete('images/games/' . $game->image);
        }


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/games/'), $imageName);
        $validatedData['image'] = $imageName;
    }


    $game->update($validatedData);


    \Log::info('Updated game data:', $game->toArray());


    return redirect()->route('games.show')->with('success', 'Game updated successfully!');
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
