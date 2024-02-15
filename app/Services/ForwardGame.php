<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

class ForwardGame
{
    public function forwardGame()
    {
        $userRepository = new UserRepository();
        $users = $userRepository->find();
        $cardRepository = new CardRepository();
        $cards = $cardRepository->find();

        $data = $this->createDisplayData($users, $cards);
        foreach($data as $index => $user) {
            $data[$index]['isBingo'] = $this->isBingo($user['card']);
        }

        return $data;
    }

    private function isBingo($data)
    {
        $cardData = [];
        foreach ($data as $column) {
            $hit = [];
            foreach ($column as $cell) {
                $status = $cell["isHit"];
                $hit[] = $status;
            }
            array_push($cardData, $hit);
        }

        for ($i = 0; $i < 5; $i++) {
            if (!in_array(0, $cardData[$i])) {
                return true;
            }
        }

        for ($j = 0; $j < 5; $j++) {
            $col = [];
            for ($i = 0; $i < 5; $i++) {
                $col[] = $cardData[$i][$j];
            }
            if (!in_array(0, $col)) {
                return true;
            }
        }

        $diagonal1 = [];
        $diagonal2 = [];

        for ($i = 0; $i < 5; $i++) {
            $diagonal1[] = $cardData[$i][$i];
            $diagonal2[] = $cardData[$i][4 - $i];
        }
        if (!in_array(0, $diagonal1) || !in_array(0, $diagonal2)) {
            return true;
        }
    }

    private function createDisplayData($users,  $cards)
    {
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
        return $data;
    }
}
