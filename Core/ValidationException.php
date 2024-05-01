<?php

namespace Core;

class ValidationException extends \Exception
{
  public readonly array $errors;
  public readonly array $old;

  public static function throw($errors,  $old)
  {
    $instanse = new static;

    $instanse->errors = $errors;
    $instanse->old = $old;

    throw $instanse;
  }
}
