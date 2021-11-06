<?php

namespace App\Models;

class Extrasens
{
  private $name;
  private $guessList = [];
  private $result = 0;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getGuessList(): array
  {
    return $this->guessList;
  }

  public function getLastGuess(): int
  {
    return end($this->guessList);
  }

  public function getResult(): int
  {
    return $this->result;
  }

  public function setGuess(int $guess): void
  {
    $this->guessList[] = $guess;
  }

  public function setResult(int $ofset): void
  {
    $this->result += $ofset;
  }
}
