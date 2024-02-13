<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

class GameController extends Controller
{
    public function index()
    {
        // Servicesに移行させる
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
        return view('game.index', ['data' => $data]);
    }

}

