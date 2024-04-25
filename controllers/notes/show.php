<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUserId = 2;

$note = $db->query('select * from notes where id = ? ', [$_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
  'heading' => 'My note',
  'note' => $note
]);
