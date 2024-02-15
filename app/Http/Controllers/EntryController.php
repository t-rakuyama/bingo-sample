<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

use App\Services\CreateGame;

class EntryController extends Controller
{
    public function index()
    {
        $cardRepository = new CardRepository();
        $cardRepository->deleteCard();
        $userRepository = new UserRepository();
        $userRepository->deleteUser();

        return view('entry');
    }

    public function post(Request $request)
    {
        $names = $request['name'];
        $nameList = explode(' ', $names);

        $createGame = new CreateGame();
        $createGame->create($nameList);

        session()->flush();
        $numbers = range(1, 75);
        shuffle($numbers);
        session(['numbers'=>$numbers]);

        return redirect()->action('App\Http\Controllers\GameController@index');
    }
}
