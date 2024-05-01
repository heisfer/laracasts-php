<?php

use Core\App;
use Core\Database;
use Core\Validator;

/**
 * @var Database $db
 */
$db = App::resolve(Database::class);

$body = $_POST['body'];
$errors = [];


if (!Validator::string($body, 1, 1000)) {
  $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (!empty($errors)) {
  view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
  ]);
}

if (empty($errors)) {
  $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 2
  ]);

  header('location: /notes');
  die();
}
