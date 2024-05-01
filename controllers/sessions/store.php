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

if (!Validator::string($password)) {
  $errors['password'] = "Min 8 characters";
}


if (!empty($errors)) {
  return view('sessions/create.view.php', [
    'errors' => $errors
  ]);
}


/**
 * @var Database $db
 */
$db = App::resolve(Database::class);


$user = $db->query("SELECT * FROM users WHERE email = :email", [
  'email' => $email
])->find();
if (!$user) {
  return view('sessions/create.view.php', [
    'error' => 'No matching account found for that email address'
  ]);
}

if (password_verify($password, $user['password'])) {
  login($user);
  // if yes, redirect to login page

  header('location: /');
  exit();
}

return view('sessions/create.view.php', [
  'error' => 'Wrong credentials'
]);

exit();
