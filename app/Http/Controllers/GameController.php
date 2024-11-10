<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view("games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'genre' => 'required|max:500',
            'tags' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/books'), $imageName);
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
    
 
        return to_route('games.index')->with('success', 'Book created successfully!');
    }


    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}