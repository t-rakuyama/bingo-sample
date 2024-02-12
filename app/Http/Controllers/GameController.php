<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\CardRepository;
use App\Services\CreateGame;

class GameController extends Controller
{
    public function index()
    {
        // Servicesに移行させる
        $userRepository = new UserRepository();
        $users = $userRepository->find();
        $cardRepository = new CardRepository();
        $cards = $cardRepository->find();
        return view('game.index');
    }

    public function post(Request $request)
    {
        $names = $request['name'];
        $nameList = explode(' ', $names);

        $createGame = new CreateGame();
        $createGame->create($nameList);

        return redirect()->action('App\Http\Controllers\GameController@index');
    }
}

