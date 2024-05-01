<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the user input
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = "Please provide correct email";
}

if (!Validator::string($password, 8, 255)) {
  $errors['password'] = "Min 8 characters";
}


if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}


/**
 * @var Database $db
 */
$db = App::resolve(Database::class);


// check if account already exists
$user = $db->query("SELECT * FROM users WHERE email = :email", [
  'email' => $email
])->find();
if ($user) {
  // if yes, redirect to login page

  header('location: /');
  exit();
} else {
  // if no, save one to database, and then log the user in, and redirect.
  $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => $password,
  ]);

  $_SESSION['user'] = [
    'email' => $email
  ];

  header('location: /');
  exit();
}
