<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

/**
 * 数字を引きカードを更新する
 * sessionは試しで使ってみた
 */
class DrawCard
{
    public function draw(): void
    {
        // sessionからnumbersを取得
        $numbers = session('numbers');

        // 先頭の要素を取得し削除
        $number = array_shift($numbers);

        // 出た要素を取り除いた配列と引いた値をsessionに詰め直す
        session(['numbers'=>$numbers]);
        session(['number'=>$number]);

        // cardのisHitを更新しにいく
        $cardRepository = new CardRepository();
        $cardRepository->update($number);
    }
}
