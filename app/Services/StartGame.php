<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

class StartGame
{
    public function reset() {
        $cardRepository = new CardRepository();
        $cardRepository->deleteCard();
        $userRepository = new UserRepository();
        $userRepository->deleteUser();
    }

    public function create(array $nameList)
    {
        foreach ($nameList as $name) {
            // Serviceクラス挟む
            $userRepository = new UserRepository();
            $user = $userRepository->createUser($name);
            $cardRepository = new CardRepository();
            $cardRepository->createCard($user->id);
        }
        session()->flush();
        $numbers = range(1, 75);
        shuffle($numbers);
        session(['numbers'=>$numbers]);
    }
}
