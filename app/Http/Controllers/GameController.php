<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

class GameController extends Controller
{
    public function index()
    {
        return view('game.index');
    }

    public function post(Request $request)
    {
        $names = $request['name'];
        $nameList = explode(' ', $names);

        foreach ($nameList as $name) {
            // Serviceクラス挟む
            $userRepository = new UserRepository();
            $user = $userRepository->createUser($name);
            $cardRepository = new CardRepository();
            $cardRepository->createCard($user->id);
        }

        return redirect()->action('App\Http\Controllers\GameController@index');
    }
}

