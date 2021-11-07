<?php

namespace App\Http\Services;

class Sess
{
  public static function set(string $key, $value): void
  {
    session([$key => serialize($value)]);
  }

  public static function get(string $key)
  { 
    return unserialize(session($key));
  }
}
