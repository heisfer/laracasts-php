<?php


$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $body = $_POST['body'];
  $errors = [];


  if (!Validator::string($body, 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
  }

  if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => 2
    ]);
  }
}
view('notes/create.view.php', [
  'heading' => 'Create Note',
  'errors' => $errors
]);