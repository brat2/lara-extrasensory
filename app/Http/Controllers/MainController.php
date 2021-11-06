<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\Extrasensory;
use Illuminate\Http\Request;

class MainController extends Controller
{

    private $extrasensory;

    private $user;

    public function __construct(
        Extrasensory $extrasensory,
        User $user
    ) {
        $this->extrasensory = $extrasensory;
        $this->user = $user;
    }

    public function start()
    {
        return view('start');
    }

    public function makeGuess()
    {
        $this->extrasensory->makeGuess();
        redirect('showGuess');
    }

    public function showGuess()
    {
        $extrasensList = $this->extrasensory->getExtrasensList();
        return view('guess', ['extrasensList' => $extrasensList]);
    }

    public function setResult(Request $request)
    {
        $request->validate([]);
        if (!$request) {
            $error = 'Введите двузначное число';
            return view('showGuess');
        }
        $answer = $request->answer;
        $this->extrasensory->setResult($answer);
        $this->user->addNumber($answer);
        view('showResult');
    }

    public function showResult()
    {
        $extrasensList = $this->extrasensory->getExtrasensList();
        $numberList = $this->user->getNumberList();
        return view('result', [
            'extrasensList' => $extrasensList,
            'numberList' => $numberList
        ]);
    }
}
