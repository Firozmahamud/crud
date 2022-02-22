<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $game= game::all();
        return view('game.index',compact('game'));
    }


    public function create()
    {
        return view('game.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
        ]);
        $show = Game::create($validatedData);

        return redirect('/game')->with('success', 'Game is successfully saved');
    }


    public function show(game $game)
    {
        //
    }


    public function edit($id)
    {
        $game = Game::findOrFail($id);

        return view('game.edit', compact('game'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required'
        ]);
        Game::whereId($id)->update($validatedData);

        return redirect('/game')->with('success', 'Game Data is successfully updated');
    }


    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect('/game')->with('success', 'Game Data is successfully deleted');
    }
}
