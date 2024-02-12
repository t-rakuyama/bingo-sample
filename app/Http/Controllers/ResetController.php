<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\CardRepository;

class ResetController extends Controller
{
    public function index()
    {
        $cardRepository = new CardRepository();
        $cardRepository->deleteCard();
        $userRepository = new UserRepository();
        $userRepository->deleteUser();

        return view('entry');
    }
}

