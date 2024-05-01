<?php


use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


// validate the user input
$form = new LoginForm();

if (!$form->validate($email, $password)) {
  return view('session/create.view.php', [
    'errors' => $form->errors(),
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