<?php

namespace App\Models;

use App\Http\Services\Sess;
use Illuminate\Http\Request;

class User
{
    private $numberList = [];

    public function __construct(Request $request)
    {
        // if ($request->session()->has('numberList')) {
        //     Sess::get('numberList');
        // }
    }

    public function addNumber(int $number): void
    {
        $this->numberList[] = $number;

        Sess::set('numberList', $this->numberList);
    }

    public function getNumberList(): array
    {
        return $this->numberList;
    }
}
