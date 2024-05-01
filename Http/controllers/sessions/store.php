<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password'],
];

$form = LoginForm::validate($attributes);

$signedIn = (new Authenticator)->attempt(
  $attributes['email'],
  $attributes['password']
);

if (!$signedIn) {
  $form->error('message', 'Wrong credentials')->throw();

  return redirect('/login');
}

redirect('/');
