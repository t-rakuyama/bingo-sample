<?php

namespace App\Http\Controllers;


use App\Services\DrawCard;
use App\Services\ForwardGame;

class GameController extends Controller
{
    public function index()
    {
        $forwardGame = new ForwardGame();
        $data = $forwardGame->forwardGame();
        $number = session('number');
        $isFinish = session('isFinish');
        return view('game.index', ['data' => $data, 'number' => $number, 'isFinish' => $isFinish ]);
    }

    public function post()
    {
        $drawCard = new DrawCard();
        $drawCard->draw();
        return redirect()->action('App\Http\Controllers\GameController@index');
    }

}

