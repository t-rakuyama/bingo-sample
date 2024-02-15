<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\CardRepository;
use App\Services\DrawCard;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $userRepository = new UserRepository();
        $users = $userRepository->find();
        $cardRepository = new CardRepository();
        $cards = $cardRepository->find();

        $data = [];
        foreach($users as $user) {
            $pData = ['name' => $user->name];
            $cardData = [];

            foreach ($cards as $key => $card) {
                if($card->user_id === $user->id) {
                    array_push($cardData, ['value' => $card->value, 'isHit' => $card->isHit]);
                }
            }
            $pData['card'] = array_chunk($cardData, 5);
            array_push($data, $pData);
        }
        $number = session('number');
        return view('game.index', ['data' => $data, 'number' => $number]);
    }

    public function post()
    {
        $drawCard = new DrawCard();
        $drawCard->draw();
        return redirect()->action('App\Http\Controllers\GameController@index');
    }

}

