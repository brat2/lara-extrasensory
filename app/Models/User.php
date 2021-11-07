<?php

namespace App\Models;

use App\Http\Services\Sess;

class User
{
    private $numberList = [];

    public function setNumberList()
    {
        if (session()->has('numberList')) {
            $this->numberList = Sess::get('numberList');
        }
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
