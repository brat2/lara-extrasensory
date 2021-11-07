<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\Extrasensory;
use App\Http\Requests\AnswerRequest;

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
        return redirect()->route('showGuess');
    }

    public function showGuess()
    {
        //  echo session('extrasensList');
        //  dump(request());
        $extrasensList = $this->extrasensory->getExtrasensList();
        return view('guess', ['extrasensList' => $extrasensList]);
    }

    public function setResult(AnswerRequest $request)
    {
        $answer = $request->answer;
        $this->extrasensory->setResult($answer);
        $this->user->addNumber($answer);
        return redirect()->route('showResult');
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
