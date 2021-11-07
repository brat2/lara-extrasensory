<?php

namespace App\Http\Services;

use App\Models\Extrasens;
use App\Http\Services\Sess;
use Illuminate\Support\Facades\Config;

class Extrasensory
{
  private $extrasensList = [];

  public function setExtrasensList()
  {
    if (session()->has('extrasensList')) {
      $this->extrasensList = Sess::get('extrasensList');
    } else {
      $this->createExtrasens(Config::get('extrasensList'));
    }
  }

  public function getExtrasensList(): array
  {
    return $this->extrasensList;
  }

  public function makeGuess(): void
  {
    foreach ($this->extrasensList as $extrasens) {
      $guess = mt_rand(10, 99);
      $extrasens->setGuess($guess);
    }

    Sess::set('extrasensList', $this->extrasensList);
  }

  public function setResult(int $answer): void
  {
    foreach ($this->extrasensList as $extrasens) {
      $lastGuess = $extrasens->getLastGuess();
      if ($answer == $lastGuess) {
        $extrasens->setResult(1);
      } else {
        $extrasens->setResult(-1);
      }
    }

    Sess::set('extrasensList', $this->extrasensList);
  }

  private function createExtrasens(array $names): void
  {
    foreach ($names as $name) {
      $this->extrasensList[] = new Extrasens($name);
    }
  }
}
