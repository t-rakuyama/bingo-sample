<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\StartGame;

class EntryController extends Controller
{
    public function index()
    {
        $createGame = new StartGame();
        $createGame->reset();

        return view('entry');
    }

    public function post(Request $request)
    {
        $names = $request['name'];
        $nameList = explode(' ', $names);

        $createGame = new StartGame();
        $createGame->create($nameList);

        return redirect()->action('App\Http\Controllers\GameController@index');
    }
}
