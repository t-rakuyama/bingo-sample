<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

class CreateGame
{
    public function create(array $nameList)
    {
        foreach ($nameList as $name) {
            // Serviceクラス挟む
            $userRepository = new UserRepository();
            $user = $userRepository->createUser($name);
            $cardRepository = new CardRepository();
            $cardRepository->createCard($user->id);
        }
    }
}
