<?php
namespace App\Repositories;

use App\Models\Card;

class CardRepository
{
    public function createCard(string $userId)
    {
        $querys = [];
        $numbers = [];
        for($i = 0; $i < 5; $i++) {
            $col = range($i * 15 + 1, $i * 15 + 15);
            shuffle($col);
            $numbers = array_merge($numbers , array_slice($col, 0, 5));
        }
        $numbers[12] = 'FREE';

        foreach ($numbers as $index => $number) {
            $isHit = 0;
            if($index === 12) {
                $isHit = 1;
            }
            array_push($querys, ['user_id' => $userId, 'cellNumber' => $index + 1, 'value' => $number, 'isHit' => $isHit]);
        }
        Card::insert($querys);
    }

    public function find()
    {
        return Card::all();
    }

    public function deleteCard()
    {
        Card::query()->delete();
    }
}
