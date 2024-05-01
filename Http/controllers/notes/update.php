<?php

use Core\App;
use Core\Database;
use Core\Validator;

/**
 * @var Database $db
 */
$db = App::resolve(Database::class);

// find the corresponding note

$body = $_POST['body'];
$currentUserId = 2;
$errors = [];
// authorize that the current user can edit the note

$note = $db->query('select * FROM notes where id = :id', [
  'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// validate the form

if (!Validator::string($body, 1, 1000)) {
  $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (!empty($errors)) {
  view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note,
  ]);
}

// if no validation error, update the record in the notes database table

if (empty($errors)) {
  $db->query('UPDATE notes SET body = :body WHERE user_id = :user_id AND id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
    'user_id' => $currentUserId
  ]);

  header('location: /note?id=' . $_POST['id']);
  die();
}
