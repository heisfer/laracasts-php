<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected $errors = [];
  public function validate($email, $password)
  {
    if (!Validator::email($email)) {
      $this->errors['email'] = "Please provide correct email";
    }

    if (!Validator::string($password)) {
      $this->errors['password'] = "Min 8 characters";
    }

    return empty($errors);
  }

  public function errors()
  {
    return $this->errors;
  }
}
