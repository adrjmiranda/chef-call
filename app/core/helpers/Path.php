<?php

namespace App\Core\Helpers;

class Path
{
  public static function root(): string
  {
    return dirname(dirname(dirname(__FILE__)));
  }
}